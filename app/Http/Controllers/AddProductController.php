<?php
namespace App\Http\Controllers;
use App\Product;

use App\Commande;
use App\Loan;
use App\Sale;
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
    // $product->quantity = ($product->quantity) - ($request->qty_pro);
    // $product->save();

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


    // $product->quantity = ($product->quantity) + $quantity;
    // $product->save();

    $commande->price = $commande->price - ($product->price * $quantity);
    $commande->save();

    $commande->products()->detach($id_product);

    return redirect()->back();

  }


  public function sale($id, AddProductRequest $request)
  {
    $sale = Sale::findOrFail($id);
    $product = Product::findOrFail($request->product_id);


    // If the quantity requested is higher than available => we redirect with errors.
    if ($request->qty_pro > $product->quantity) {
      return redirect()->back()->withErrors([
        'qty_pro' => 'The quantity requested is more than available.'
      ]);
    }

    // The command already has the product => we update the pivot table.
    if ($sale->products->contains($product)) {
      $currentQty = $sale->products->find($request->product_id)->pivot->quantity_sale;
      $sale->products()->updateExistingPivot($product->id, [
        'quantity_sale' => $currentQty + $request->qty_pro
      ]);

      // Otherwise => we attach a new relationship between the command and the product.
    } else {
      $sale->products()->attach($request->product_id, [
        'quantity_sale' => $request->qty_pro
      ]);
    }

    // We update the product quantity.
    $product->quantity = ($product->quantity) - ($request->qty_pro);
    $product->save();

    // We update the price
    $sale->price = $sale->price + ($product->price * $request->qty_pro);
    $sale->save();

    return redirect()->back();
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
  public function loan($id, AddProductRequest $request)
  {

    $loan = Loan::findOrFail($id);
    $product = Product::findOrFail($request->product_id);

    // If the quantity requested is higher than available => we redirect with errors.
    if ($request->machin > $product->quantity) {
      return redirect()->back()->withErrors([
        'machin' => 'The quantity requested is more than available.'
      ]);
    }
    // The command already has the product => we update the pivot table.
    if ($loan->products->contains($product)) {
      $currentQty = $loan->products->find($request->product_id)->pivot->quantity_loan;
      $loan->products()->updateExistingPivot($product->id, [
        'quantity_loan' => $currentQty + $request->machin
      ]);

      // Otherwise => we attach a new relationship between the command and the product.
    } else {
      $loan->products()->attach($request->product_id, [
        'quantity_loan' => $request->machin
      ]);
    }

    // We update the product quantity.
    $product->quantity = ($product->quantity) - ($request->machin);
    $product->save();

    return redirect()->back();
  }

  public function remove_product_loan($id_loan, $id_product, $quantity)
  {
    //dd($quantity);
    $loan = Loan::findOrFail($id_loan);
    $product = Product::findOrFail($id_product);

    $product->quantity = ($product->quantity) + $quantity;
    $product->save();

    $loan->products()->detach($id_product);

    return redirect()->back();
  }

}
