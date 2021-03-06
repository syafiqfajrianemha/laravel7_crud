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
    return view('home');
});

// Category
Route::get('category', 'CategoryController@index');
Route::get('category/create', 'CategoryController@create');
Route::get('category/{product}', 'CategoryController@show');
Route::post('category', 'CategoryController@store');
Route::delete('category/{product}', 'CategoryController@destroy');
Route::get('category/{product}/edit', 'CategoryController@edit');
Route::put('category/{product}', 'CategoryController@update');

// Product
// Route::get('products', 'ProductController@index');
// Route::get('products/create', 'ProductController@create');
// Route::get('products/{product}', 'ProductController@show');
// Route::post('products', 'ProductController@store');
// Route::delete('products/{product}', 'ProductController@destroy');
// Route::get('products/{product}/edit', 'ProductController@edit');
// Route::put('products/{product}', 'ProductController@update');
Route::resource('products', 'ProductController');
