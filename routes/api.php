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

Route::get('/product/{id}', 'App\Http\Controllers\ProductController@getProduct');
Route::get('/products/{search?}', 'App\Http\Controllers\ProductController@getAllProducts');
Route::post('/addProduct', 'App\Http\Controllers\ProductController@addProduct');
Route::post('/updateProduct', 'App\Http\Controllers\ProductController@updateProduct');
Route::delete('/deleteProduct/{id}', 'App\Http\Controllers\ProductController@deleteProduct');
