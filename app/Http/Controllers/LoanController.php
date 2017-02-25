<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Loan;
use App\User;
use App\Product;
use Auth;

class LoanController extends Controller
{
  /**
  * Create a new controller instance.
  *
  * @return void
  */
  public function __construct()
  {
    $this->middleware('auth');
  }

  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $loans = Loan::all();
    $products = Product::all();

    return view('loan.index', ['loans' => $loans, 'products' => $products]);
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    return view('loan.create');
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {
    $loan = new Loan;
    $loan->created_by = Auth::id();
    $loan->date_start = $request->date_start;
    $loan->date_end = $request->date_end;
    $loan->save();

    //$loan->products()->attach($request->product_list);

    return view('loan.show', ['loan' => $loan]);
  }

  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function show($id)
  {
    $loan = loan::find($id);

    return view('loan.show', ['loan' => $loan]);
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function edit($id)
  {
    $loan = Loan::find($id);

    return view('loan.edit', ['loan' => $loan]);
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, $id)
  {
    $loan = Loan::find($id);
    $loan->update($request->all());

    return view('loan.show', ['loan' => $loan]);
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy($id)
  {
    //
  }
}
