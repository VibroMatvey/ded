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

Route::get('/', 'App\Http\Controllers\Home\HomeController@index');

Route::get('/about', 'App\Http\Controllers\Home\HomeController@about');

Route::get('/catalog', 'App\Http\Controllers\Catalog\CatalogController@index');

Route::get('/products/{category}', 'App\Http\Controllers\Catalog\CatalogController@product');

Route::get('/product/{id}', 'App\Http\Controllers\Catalog\CatalogController@showProduct');

Route::get('/cabinet', 'App\Http\Controllers\Cabinet\CabinetController@index');

Route::get('/cabinet/admin', 'App\Http\Controllers\Cabinet\CabinetController@admin',)->name('admin');

Route::post('/addToCart', 'App\Http\Controllers\Cart\CartController@add');

Auth::routes();

Route::get('/home', 'App\Http\Controllers\Home\HomeController@index');
