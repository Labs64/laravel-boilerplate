<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::get('/test/{type}','ApiController@getPackage');
Route::get('/test/{type}','APIController@getPackage');
//Route::get('/test/{type}','ApiController@getPackage');
Route::get('/test/{time_from}/{time_to}/{id}/{category}','APIController@getBooking');
Route::get('/test/{id}/{category}','APIController@getBookingPrice');