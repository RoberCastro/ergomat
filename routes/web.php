<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Auth::routes();

Route::get('/', function () { return view('welcome'); });


Route::get('/home', 'HomeController@index')->name('dashboard');


/*
|--------------------------------------------------------------------------
| Web Routes Resources
|--------------------------------------------------------------------------
*/

Route::resource('user', 'UserController', ['except' => ['create','store']]);

Route::resource('patient', 'PatientController');

Route::resource('product', 'ProductController');

Route::resource('loan', 'LoanController');
