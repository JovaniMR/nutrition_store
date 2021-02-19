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

//General
Route::get('/', 'HomeController@index');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/products/{id}','Admin\Products\ProductController@show');

Route::get('/search','SearchController@show');

//User Auth
Auth::routes();

// Admin dashboard
Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('/admin/products','Admin\Products\ProductController');

    //Product-images
    Route::get('/admin/products/{id}/images','Admin\Products\ProductImageController@index')->name('images.index');
    Route::post('/admin/products/{id}/images','Admin\Products\ProductImageController@store')->name('images.store');
    Route::get('/admin/products/images','Admin\Products\ProductImageController@create')->name('images.create');
    Route::delete('/admin/products/{id}/images','Admin\Products\ProductImageController@destroy')->name('images.delete');
    Route::get('/admin/products/{id}/images/select/{image}','Admin\Products\ProductImageController@select')->name('images.select');
    
    //orders
    Route::get('/orders','OrderController@index')->name('order.index');
    Route::get('/orders/{id}','OrderController@show')->name('order.show');
    Route::post('/orders/{id}','OrderController@update')->name('order.update');
});

// Shopping cart
Route::post('/cart-add','ShoppingCart@add')->name('cart.add');
Route::post('/cart-removeOne/{product_id}','ShoppingCart@removeOne')->name('cart.removeOne');
Route::post('/cart-addOne/{product_id}','ShoppingCart@addOne')->name('cart.addOne');
Route::delete('/cart-delete/{product_id}','ShoppingCart@delete')->name('cart.delete');
Route::get('/cart','ShoppingCart@index')->name('cart.index');

//payment paypal
Route::middleware(['auth', 'payment'])->group(function () {

    Route::get('/paypal/pay', 'PaymentController@payWithPayPal')->name('paypal.pay');
    Route::get('/paypal/status', 'PaymentController@payPalStatus')->name('paypal.status');
});

//Orders
Route::middleware(['auth'])->group(function () {

    Route::get('/orders','OrderController@index')->name('order.index');
    Route::get('/orders/{id}','OrderController@show')->name('order.show');
});
