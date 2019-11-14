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



Route::group(['namespace'=>'Api'], function () {
    Route::post('login', 'IndexController@login');
    Route::get('info', 'IndexController@info');
});


Route::group(['namespace'=>'Api','middleware'=>'auth.jwt'], function () {
    Route::get('info', 'IndexController@info');
    Route::get('logout', 'IndexController@logout');
});





