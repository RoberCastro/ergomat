<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Sale;
use App\Patient;
use App\Product;
use Auth;
use Carbon\Carbon;

class SaleController extends Controller
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
    $sales = Sale::all();
    $products = Product::all();

    return view('sale.index', ['sales' => $sales, 'products' => $products]);
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    $patient = Patient::all();
    $user = User::find(Auth::id());

    return view('sale.create', ['patient' => $patient, 'user' => $user]);

  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {
    $sale = new Sale;
    $user = User::find(Auth::id());
    $products = Product::all();


    $patient = Patient::where('reference', $request->patient)->first();
    //dd($patient[0]['attributes']['id']);

    $inputS  = $request->date_sale;
    $formatS = 'Y-m-d';

    $datesale = Carbon::createFromFormat($formatS, $inputS);

    $sale->patient_id = $patient->id;
    $sale->price = $request->price;
    $sale->date_sale = $datesale;
    $sale->created_by = $user->email;

    $sale->save();

    return view('sale.show', ['sale' => $sale, 'products' => $products]);
  }

  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function show($id)
  {
    $sale = Sale::find($id);
    $products = Product::all();

    return view('sale.show', ['sale' => $sale, 'products' => $products]);
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function edit($id)
  {
    $sale = Sale::find($id);

    return view('sale.edit', ['sale' => $sale]);
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
    $sale = Sale::find($id);
    $sale->update($request->all());

    return view('sale.show', ['sale' => $sale]);  }

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
