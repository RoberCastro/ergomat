<?php
namespace App\Http\Controllers;
use App\Product;

use App\Commande;
use Illuminate\Http\Request;
use App\Http\Requests\AddProductRequest;
class AddProductController extends Controller
{
  public function commande($id, AddProductRequest $request)
  {
    $commande = Commande::findOrFail($id);
    $product = Product::findOrFail($request->product_id);

    // If the quantity requested is higher than available => we redirect with errors.
    if ($request->qty_pro > $product->quantity) {
      return redirect()->back()->withErrors([
        'qty_pro' => 'The quantity requested is more than available.'
      ]);
    }

    // The command already has the product => we update the pivot table.
    if ($commande->products->contains($product)) {
      $currentQty = $commande->products->find($request->product_id)->pivot->quantity_comm;
      $commande->products()->updateExistingPivot($product->id, [
        'quantity_comm' => $currentQty + $request->qty_pro
      ]);

    // Otherwise => we attach a new relationship between the command and the product.
    } else {
      $commande->products()->attach($request->product_id, [
        'quantity_comm' => $request->qty_pro
      ]);
    }

    // We update the product quantity.
    $product->quantity = ($product->quantity) - ($request->qty_pro);
    $product->save();

    // We update the price
    $commande->price = $commande->price + ($product->price * $request->qty_pro);
    $commande->save();

    return redirect()->back();
  }

  public function remove_product($id_commande, $id_product, $quantity)
  {
    //dd($quantity);
    $commande = Commande::findOrFail($id_commande);
    $product = Product::findOrFail($id_product);


    $product->quantity = ($product->quantity) + $quantity;
    $product->save();

    $commande->price = $commande->price - ($product->price * $quantity);
    $commande->save();

    $commande->products()->detach($id_product);

    return redirect()->back();

  }

  public function sale($id, Request $request)
  {
    $sale = Sale::findOrFail($id);
    $product = Product::findOrFail($request->product_id);

    if (!((int) $request->qty_pro > $product->quantity)){

      // The command already has the product => we update the pivot table.
      if ($sale->products->contains($product)) {
        $currentQty = $sale->products->find($request->product_id)->pivot->quantity_comm;
        $sale->products()->updateExistingPivot($product->id, [
          'quantity_comm' => $currentQty + $request->qty_pro
        ]);

        // Otherwise => we attach a new relationship between the command and the product.
      } else {
        $sale->products()->attach($request->product_id, [
          'quantity_comm' => $request->qty_pro
        ]);
      }

      // We update the product quantity.
      $product->quantity = ($product->quantity) - ($request->qty_pro);
      $sale->price = $sale->price + ($product->price * $request->qty_pro);
      $product->save();
      $sale->save();
      return redirect()->back();
    }else{
      alert("Oops... Something went wrong!");
    }

  }

  public function remove_product_sale($id_sale, $id_product, $quantity)
  {
    //dd($quantity);
    $sale = Sale::findOrFail($id_sale);
    $product = Product::findOrFail($id_product);


    $product->quantity = ($product->quantity) + $quantity;
    $product->save();

    $sale->price = $sale->price - ($product->price * $quantity);
    $sale->save();

    $sale->products()->detach($id_product);

    return redirect()->back();


  }
}