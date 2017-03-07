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
Route::get('/admin/testemail', 'HomeController@testEmail')->name('admin.email')->middleware(['auth','admin']);
Route::get('/admin', 'HomeController@admin')->name('admin')->middleware(['auth','admin']);



/*
|--------------------------------------------------------------------------
| Web Routes Resources
|--------------------------------------------------------------------------
*/

Route::resource('user', 'UserController');

Route::resource('patient', 'PatientController');

Route::resource('product', 'ProductController');
Route::post('product/add/{commande}', 'AddProductController@commande')->name('addproduct.commande');

Route::resource('loan', 'LoanController');

Route::resource('sale', 'SaleController');

Route::resource('commande', 'CommandeController');

Route::post('store_patient', ['as' => 'store_patient', 'uses' => 'PatientController@store']);
