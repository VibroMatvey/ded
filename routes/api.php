<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('/get', 'App\Http\Controllers\Get\GetController');
    Route::get('/logout', 'App\Http\Controllers\Cabinet\CabinetController@logout');
    Route::post('/products', 'App\Http\Controllers\Catalog\ProductController@store');
    Route::post('/categories', 'App\Http\Controllers\Catalog\CategoryController@store');
});

//Route::get('/products', 'App\Http\Controllers\Catalog\ProductController@index');
//Route::get('/product/{category}', 'App\Http\Controllers\Catalog\ProductController@show');
