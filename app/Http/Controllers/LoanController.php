<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoanRequest;


use App\Loan;
use App\User;
use App\Patient;
use App\Product;
use Auth;
use PDF;
use Carbon\Carbon;

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

    $loans = Loan::with('patient')->get();
    $products = Product::with('categorie', 'stock')->get();

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
    $patient = Patient::all();
    $user = User::find(Auth::id());

    return view('loan.create', ['patient' => $patient, 'user' => $user]);
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
    $user = User::find(Auth::id());
    $products = Product::all();
    $patient = Patient::where('reference', $request->patient)->first();

    $loan->patient_id = $patient->id;
    $loan->created_by = $user->email;
    $loan->date_start = $request->date_start;

    if($request->date_end == ""){

      $loan->date_end = null;

    }
    else {

      $loan->date_end = $request->date_end;
    }
    $loan->save();

    //dd($patient);

    return redirect()->route('loan.show', [ 'id' => $loan->id ]);
  }

  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function show(Request $request, $id)
  {
    $loan = loan::find($id);
    $products = Product::with('categorie', 'stock')->get();
    $user = User::find(Auth::id());
    $patient = Patient::where('id', $loan->patient_id)->first();
    //dd($patient);

    return view('loan.show', ['loan' => $loan, 'products' => $products, 'user' => $user, 'patient' => $patient]);
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
  public function destroy( $id)
  {
    //
  }
  public function savechanges(Request $request, $id)
  {
    $loan = Loan::findOrFail($id);

    $loan->date_start = $request->date_start;

    if($request->date_end == ""){

      $loan->date_end = null;

    }
    else {

      $loan->date_end = $request->date_end;
    }
    $loan->save();
    return redirect()->back();

  }



  public function pdf($id)
  {
    $loan = Loan::findOrFail($id);

    $pdf = PDF::loadView('loan.pdf', [ 'loan' => $loan ]);
    return $pdf->stream(); //pour simplement afficher dans le navigateur.
    //return $pdf->download("Prêt #$loan->id.pdf"); //Pour le télécharger
  }
}
