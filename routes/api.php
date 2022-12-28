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

Route::get('/deliveries', 'CourierDeliveryController@index');
Route::post('/deliveries', 'CourierDeliveryController@store');
Route::get('/deliveries/{delivery}', 'CourierDeliveryController@show');
Route::put('/deliveries/{delivery}', 'CourierDeliveryController@update');
Route::delete('/deliveries/{delivery}', 'CourierDeliveryController@destroy');

Route::get('/orders', 'OrderController@index');
Route::post('/orders', 'OrderController@store');
Route::get('/orders/{order}', 'OrderController@show');
Route::put('/orders/{order}', 'OrderController@update');
Route::delete('/orders/{order}', 'OrderController@destroy');
