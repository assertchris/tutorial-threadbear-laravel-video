<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('products', 'ProductController')->middleware('auth')->except("show");
Route::resource('products', 'ProductController')->only("show");
Route::post("products/{product}/purchase", "ProductController@purchase")->name("products.purchase")->middleware('auth');

Route::get("account", "AccountController@index")->name("account.index")->middleware("auth");
Route::patch("account/change/{plan}", "AccountController@change")->name("account.change")->middleware("auth");
