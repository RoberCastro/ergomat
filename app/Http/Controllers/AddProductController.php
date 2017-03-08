<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Commande;
use App\Product;
class AddProductController extends Controller
{
  public function commande($id, Request $request)
  {
    $commande = Commande::findOrFail($id);
    $product = Product::findOrFail($request->product_id);

    if (!((int) $request->qty_pro > $product->quantity)){

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
      return redirect()->back();
    }else{
      alert("Oops... Something went wrong!");
    }


  }

  public function remove_product($id_commande, $id_product, $quantity)
  {
    //dd($quantity);
    $commande = Commande::findOrFail($id_commande);
    $product = Product::findOrFail($id_product);

    $product->quantity = ($product->quantity) + $quantity;
    $product->save();

    $commande->products()->detach($id_product);

    return redirect()->back();


  }
}
