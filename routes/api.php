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

Route::get('/deliveries', 'DeliveryController@index');
Route::post('/deliveries', 'DeliveryController@store');
Route::get('/deliveries/{delivery}', 'DeliveryController@show');
Route::put('/deliveries/{delivery}', 'DeliveryController@update');
Route::delete('/deliveries/{delivery}', 'DeliveryController@destroy');

Route::get('/orders', 'OrderController@index');
Route::post('/orders', 'OrderController@store');
Route::get('/orders/{order}', 'OrderController@show');
Route::put('/orders/{order}', 'OrderController@update');
Route::delete('/orders/{order}', 'OrderController@destroy');
