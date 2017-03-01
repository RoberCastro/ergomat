<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\User;
use Illuminate\Support\Facades\Storage;
use App\Product;
use Auth;


class ProductController extends Controller
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
    $products = Product::all();

    return view('product.index', ['products' => $products]);
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    return view('product.create');
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {
    $product = new Product;
    $product->name = $request->name;
    $product->description = $request->description;
    $product->side = $request->side;
    $product->price = $request->price;
    $product->pro_date_status = $request->pro_date_status;
    $product->quantity = $request->quantity;

    $product->save();

    return view('product.show', ['product' => $product]);
  }

  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function show($id)
  {
    $product = Product::find($id);

    return view('product.show', ['product' => $product]);
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function edit($id)
  {
    $product = Product::find($id);

    return view('product.edit', ['product' => $product]);
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
    $product = Product::find($id);
    $product->update($request->all());

    return view('product.show', ['product' => $product]);
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy($id)
  {
    $product = Product::find($id);
    $product->delete();

    //$this->authorize('delete', $product);

    return redirect()->back();    }
  }
