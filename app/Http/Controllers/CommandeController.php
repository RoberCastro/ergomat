<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Commande;
use App\Patient;
use App\Product;
use Auth;
use Carbon\Carbon;

class CommandeController extends Controller
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
    $commandes = Commande::all();
    $products = Product::all();

    return view('commande.index', ['commandes' => $commandes, 'products' => $products]);
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    $user = User::find(Auth::id());

    return view('commande.create', ['user' => $user]);

  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {
    $commande = new Commande;
    $user = User::find(Auth::id());
    $inputS  = $request->date_commande;
    $formatS = 'Y-m-d';

    $datestart = Carbon::createFromFormat($formatS, $inputS);

    $commande->price = $request->price;
    $commande->created_by = $user->email;
    $commande->date_commande = $datecommande;

    $commande->save();

    return view('commande.show', ['commande' => $commande]);
  }

  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function show(Request $request, $id)
  {
    $commande = Commande::find($id);
    $products = Product::all();

    //$commande->products()->sync($request->product_list);


    return view('commande.show', ['commande' => $commande, 'products' => $products]);
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function edit($id)
  {
    $commande = Commande::find($id);

    return view('commande.edit', ['commande' => $commande]);
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
    $commande = Commande::find($id);
    $commande->update($request->all());

    return view('commande.show', ['commande' => $commande]);
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
