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
		Route::get('/masterKota',['uses' => 'HomeController@masterKota','as' => 'masterKota']);
		Route::post('/input-city-rocees',['uses' => 'HomeController@inputCityProcees', 'as' => 'inputCityProcees']);
		Route::get('/deleteCity',['uses' => 'HomeController@deleteCity', 'as' => 'deleteCity']);
		Route::get('/editCity',['uses' => 'HomeController@editCity', 'as' => 'editCity']);
		Route::post('/update',['uses' => 'HomeController@update', 'as' => 'update']);
		Route::get('/districts',['uses' => 'HomeDistrictsController@index', 'as' => 'districts']);
		Route::post('/saveDistricts',['uses' => 'HomeDistrictsController@saveDistricts', 'as' => 'saveDistricts']);
		
		Route::get('/master-jenis',['uses' => 'MasterJenisController@index', 'as' => 'masterJenis']);
		Route::post('/save-jenis',['uses' => 'MasterJenisController@saveJenis', 'as' => 'saveJenis']);
		Route::get('/edit-data',['uses' => 'MasterJenisController@editData', 'as' => 'editData']);
		Route::post('/update-data',['uses' => 'MasterJenisController@update', 'as' => 'update']);
		Route::get('/delete',['uses' => 'MasterJenisController@delete', 'as' => 'delete']);
		
		Route::get('/master-status',['uses' => 'MasterStatusController@index', 'as' => 'masterStatus']);
		Route::post('/save-status',['uses' => 'MasterStatusController@save', 'as' => 'saveStatus']);
		Route::get('/edit-status',['uses' => 'MasterStatusController@edit', 'as' => 'editStatus']);
		Route::post('/update-status',['uses' => 'MasterStatusController@update', 'as' => 'updateStatus']);
		Route::get('/delete-status',['uses' => 'MasterStatusController@delete', 'as' => 'deleteStatus']);
		
		Route::get('/master-status-barang',['uses' => 'MasterStatusBarangController@index', 'as' => 'masterStatusBarang']);
		Route::post('/save-barang',['uses' => 'MasterStatusBarangController@save', 'as' => 'saveBarang']);

	});



});
