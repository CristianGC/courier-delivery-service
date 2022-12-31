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

Route::get('/delivery','DeliveryController@index');

Route::get('/', function () {
    return view('welcome');
});
