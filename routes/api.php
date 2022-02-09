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

Route::group(['prefix' => 'v1', ], function () {

  Route::get('/', function () {
    return response()->json('Hello world.');
  });

  Route::get('/products', 'ProductController@index');
  Route::get('/products/{id}', 'ProductController@show');
  Route::post('/products', 'ProductController@store');
  Route::put('/products/{id}', 'ProductController@update');
  Route::delete('/products/{id}', 'ProductController@destroy');

});