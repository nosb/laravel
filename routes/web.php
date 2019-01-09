<?php

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

/*Route::post('login', 'AuthController@login');


/*Route::any('user', 'UserController@index')->middleware('role:test','web');
Auth::routes();*/

//Route::any('/home', 'HomeController@index')->name('home');


//Route::any('ip', 'HomeController@index');
/*Route::any('testrule', 'HomeController@testRules');
//Route::any('log', 'HomeController@log');
Route::any('collection','HomeController@collection');
Route::any('facades','HomeController@myFacades');
*/

Route::group([
    'middleware' => 'web',
], function ($router) {
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('login', 'AuthController@login');
    Route::post('me', 'AuthController@me');
});

Route::group([
    'middleware' => 'mytest',
], function ($router) {
    Route::any('home', 'HomeController@index');
});
