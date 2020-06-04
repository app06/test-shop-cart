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

Route::get('/', function () {
    return redirect()->route('products');
});

Route::get('/products', 'ProductsController@index')
    ->name('products');

Route::put('/cart', 'CartController@add')
    ->name('cart.add');

Route::delete('/cart', 'CartController@remove')
    ->name('cart.remove');
