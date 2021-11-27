<?php

use App\Models\Category;
use Facade\FlareClient\View;
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
    return view('welcome');
});



Route::resource('/product', \App\Http\Controllers\ProductController::class);
Route::get('/product/create', '\App\Http\Controllers\ProductController@create');
Route::get('product/edit/{id}', '\App\Http\Controllers\ProductController@edit');
Route::post('product/update/{id}', '\App\Http\Controllers\ProductController@update')->name('update');

Route::resource('/category', \App\Http\Controllers\CategoryController::class);
Route::get('/category/create', '\App\Http\Controllers\CategoryController@create');
Route::get('category/edit/{id}', '\App\Http\Controllers\CategoryController@edit');
Route::post('category/category/{id}', '\App\Http\Controllers\CategoryController@update')->name('c.update');


Route::post('/add-to-cart', '\App\Http\Controllers\ProductController@addToCart');
Route::get('/cart', '\App\Http\Controllers\ProductController@viewCart');
Route::get('/removeItem/{rowId}', '\App\Http\Controllers\ProductController@removeCartItem');




