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

    //Product-images
    Route::get('/admin/products/{id}/images','Admin\Products\ProductImageController@index')->name('images.index');
    Route::post('/admin/products/{id}/images','Admin\Products\ProductImageController@store')->name('images.store');
    Route::get('/admin/products/images','Admin\Products\ProductImageController@create')->name('images.create');
    Route::delete('/admin/products/{id}/images','Admin\Products\ProductImageController@destroy')->name('images.delete');
    Route::get('/admin/products/{id}/images/select/{image}','Admin\Products\ProductImageController@select')->name('images.select');
});

Route::get('/products/{id}','Admin\Products\ProductController@show');


Route::get('/micarrito', function () {
    return view('shopping-cart');
})->name('shopping-cart');