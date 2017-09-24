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

Route::group(['middleware' => 'CheckAfterLogin' ],function() {

	Route::group(['namespace' => 'Login', 'prefix' => 'login'],function() {

		Route::get('/',['uses' => 'LoginController@index','as' => 'login']);
		Route::post('/LoginProcess',['uses' => 'LoginController@LoginProcess','as' => 'LoginProcess']);

	});
	
});



Route::group(['middleware' => 'CheckDataLogin' ],function() {


	Route::group(['namespace' => 'Admin', 'prefix' => 'admin'],function() {
		
		Route::get('/',['uses' => 'HomeController@index','as' => 'home']);
		Route::get('/logout',['uses' => 'HomeController@logout','as' => 'logout']);

	});



});
