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
Route::get('product/remove/{commande}/{product}/{quantity}', 'AddProductController@remove_product')->name('addproduct.remove_product');

Route::post('product/addproductsale/{sale}', 'AddProductController@sale')->name('addproductsale.sale');
Route::get('product/removeproductsale/{sale}/{product}/{quantity}', 'AddProductController@remove_product_sale')->name('addproduct.remove_product_sale');

Route::post('product/addproductloan/{loan}', 'AddProductController@loan')->name('addproductloan.loan');
Route::get('product/removeproductloan/{loan}/{product}/{quantity}', 'AddProductController@remove_product_loan')->name('addproduct.remove_product_loan');


Route::resource('loan', 'LoanController');
Route::get('loan/{load}/pdf', 'LoanController@pdf')->name('loan.pdf');

Route::resource('sale', 'SaleController');
Route::get('sale/{sale}/pdf', 'SaleController@pdf')->name('sale.pdf');


Route::resource('commande', 'CommandeController');
Route::get('commande/{commande}/pdf', 'CommandeController@pdf')->name('commande.pdf');



Route::post('store_patient', ['as' => 'store_patient', 'uses' => 'PatientController@store']);
