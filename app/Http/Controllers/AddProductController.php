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

    // $commande->products->contains($product);

    //dd( $request->qty_pro);

    $commande->products()->attach($request->product_id, [
      'quantity_comm' => $request->qty_pro
    ]);

    return redirect()->back();
  }
}
