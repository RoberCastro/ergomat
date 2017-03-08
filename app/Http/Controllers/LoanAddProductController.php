<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Loan;
use App\Http\Requests\AddProductRequest;

class LoanAddProductController extends Controller
{
  public function loan($id, Request $request)
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

  public function remove($id_loan, $id_product, $quantity)
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
