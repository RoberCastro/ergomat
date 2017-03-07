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


    // $commande->products->contains($product);

    //dd( ($product->quantity) - ($request->qty_pro));


    if ($request->qty_pro > $product->quantity ){
      return 'Pas assez de produits';
    }else{

      //$commande->products()->updateExistingPivot($product, ['quantity_comm' => $request->qty_pro]);
      //$commande->products()->updateExistingPivot($product, [ 'quantity_comm' => $request->qty_pro ]);
      $commande->products()->attach ($request->product_id, [ 'quantity_comm' => $request->qty_pro ]);
      $product->quantity = ($product->quantity) - ($request->qty_pro);
      $product->save();
    }

    return redirect()->back();
  }
}
