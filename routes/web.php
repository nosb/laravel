<?php
Route::get('test', 'TestController@index')->middleware('role');
//Route::get('user', 'UserController@index');
/*Route::get('login', 'LoginController@index');
Route::group(['middleware' => ['web','auth']], function(){
    Route::get('user/index', 'UserController@index');
    Route::get('logout', 'LoginController@logout');
});
Route::get('getError','TestController@getError');
Route::get('test', 'TestController@index')->middleware('role');*/
//Route::get('user/{id}', 'ShowProfile');
//Route::get('/', 'IndexController@index');

//Route::get('/', 'Agent\LoginController@index');

//前台路由组

/*Route::group(['namespace' => 'Agent'], function(){
    Route::get('/', 'LoginController@index');
});*/




/*Route::post('testCsrf',function(){
    echo 1;
});*/



/*Route::post('login', 'AuthController@login');


/*Route::any('user', 'UserController@index')->middleware('role:test','web');
Auth::routes();*/

//Route::any('home', 'HomeController@index');


//Route::any('ip', 'HomeController@index');
/*Route::any('testrule', 'HomeController@testRules');
//Route::any('log', 'HomeController@log');
Route::any('collection','HomeController@collection');
Route::any('facades','HomeController@myFacades');
*/

/*Route::group([
    'middleware' => 'web',
], function ($router) {
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('login', 'AuthController@login');
    Route::post('me', 'AuthController@me');
});

Route::group([
    'middleware' => 'mytest',
], function () {
    Route::any('home', 'HomeController@index');
});*/

//Route::get('user/test', 'UserController@test');

Route::get('user/{user}', 'UserController@show');

//Route::get('profile/{user}', 'UserController@index');

//Route::post('user/test', 'UserController@test');
/*Route::get('user/cookie', 'UserController@ck');
Route::get('user/response', 'UserController@rs');
Route::get('user/view', 'UserController@view');
Route::post('user/code', 'UserController@code');
Route::get('user/models', 'UserController@models');


Route::get('test','TestController@index');
Route::get('test/getError','TestController@getError');
Route::get('sendMail','SendMailController@index');
Route::get('active','SendMailController@active');*/

/*

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');*/
