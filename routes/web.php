<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'HomeController@index');

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

// Admin products
Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('/admin/products','Admin\Products\ProductController');
});


Route::get('/product', function () {
    return view('product');
});

Route::get('/micarrito', function () {
    return view('shopping-cart');
})->name('shopping-cart');