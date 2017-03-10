<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Patient;

//use App\Http\Requests\PatientRequest;

use Illuminate\Support\Facades\Storage;

use Auth;



class PatientController extends Controller
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
    $patients = Patient::with('user')->get();

    return view('patient.index', ['patients' => $patients]);
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    $user = User::find(Auth::id());

    return view('patient.create', ['user' => $user]);

  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {

    $patient = new Patient;
    $patient->user_id = $request->user_id;
    $patient->reference = $request->reference;

    $patient->save();

    return view('patient.show', ['patient' => $patient]);
  }

  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function show($id)
  {
    $patient = Patient::find($id);
    $user = User::find(Auth::id());

    return view('patient.show', ['patient' => $patient, 'user' => $user]);
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function edit($id)
  {

    $patient = Patient::find($id);
    $user = User::find(Auth::id());


    return view('patient.edit', ['patient' => $patient, 'user' => $user]);
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
    $patient = Patient::find($id);
    $patient->update($request->all());

    return view('patient.show', ['patient' => $patient]);

  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy($id)
  {
    Patient::destroy($id);
    return response()->json([
      'success' => true,
    ]);
  }
}
