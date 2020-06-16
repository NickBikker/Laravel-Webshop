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

Route::get('/', [
    'uses' => 'ProductController@getProducts',
    'as' => 'products.index'
]);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/add-to-cart/{id}', [
    'uses' => 'ProductController@getAddToCart',
    'as' => 'product.addToCart'
]);

Route::get('/product_page/{id}', [
    'uses' => 'ProductController@getProduct',
    'as' => 'products.product'
]);


Route::get('/shoppingCart', [
    'uses' => 'ProductController@getCart',
    'as' => 'webshop.shoppingCart'
]);