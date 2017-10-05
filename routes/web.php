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
		Route::get('/indexAjax-city',['uses' => 'HomeController@indexAjax','as' => 'city.indexAjax']);
		Route::get('/logout',['uses' => 'HomeController@logout','as' => 'logout']);
		Route::get('/masterKota',['uses' => 'HomeController@masterKota','as' => 'masterKota']);
		Route::post('/input-city-rocees',['uses' => 'HomeController@inputCityProcees', 'as' => 'inputCityProcees']);
		Route::get('/deleteCity/{id}',['uses' => 'HomeController@deleteCity', 'as' => 'deleteCity']);
		Route::get('/editCity/{id}',['uses' => 'HomeController@editCity', 'as' => 'editCity']);
		Route::post('/update/home',['uses' => 'HomeController@update', 'as' => 'updateHome']);
		
		//Districts
		Route::get('/districts',['uses' => 'HomeDistrictsController@index', 'as' => 'districts']);
		Route::get('/districts/edit',['uses' => 'HomeDistrictsController@edit', 'as' => 'districts.edit']);
		Route::get('/districts/delete/{id}',['uses' => 'HomeDistrictsController@delete', 'as' => 'districts.delete']);
		Route::post('/saveDistricts',['uses' => 'HomeDistrictsController@saveDistricts', 'as' => 'saveDistricts']);
		Route::post('/updateDistricts',['uses' => 'HomeDistrictsController@update', 'as' => 'updateDistricts']);
		
		Route::get('/master-jenis',['uses' => 'MasterJenisController@index', 'as' => 'masterJenis']);
		Route::post('/save-jenis',['uses' => 'MasterJenisController@saveJenis', 'as' => 'saveJenis']);
		Route::get('/edit-data',['uses' => 'MasterJenisController@editData', 'as' => 'editData']);
		Route::post('/update-data',['uses' => 'MasterJenisController@update', 'as' => 'update']);
		Route::get('/delete/{id}',['uses' => 'MasterJenisController@delete', 'as' => 'delete']);
		
		Route::get('/master-status',['uses' => 'MasterStatusController@index', 'as' => 'masterStatus']);
		Route::post('/save-status',['uses' => 'MasterStatusController@save', 'as' => 'saveStatus']);
		Route::get('/edit-status',['uses' => 'MasterStatusController@edit', 'as' => 'editStatus']);
		Route::post('/update-status',['uses' => 'MasterStatusController@update', 'as' => 'updateStatus']);
		Route::get('/delete-status/{id}',['uses' => 'MasterStatusController@delete', 'as' => 'deleteStatus']);
		
		Route::get('/master-status-barang',['uses' => 'MasterStatusBarangController@index', 'as' => 'masterStatusBarang']);
		Route::post('/save-barang',['uses' => 'MasterStatusBarangController@save', 'as' => 'saveBarang']);
		Route::get('/edit-barang',['uses' => 'MasterStatusBarangController@edit', 'as' => 'editBarang']);
		Route::post('/update-barang',['uses' => 'MasterStatusBarangController@update', 'as' => 'updateBarang']);
		Route::get('/delete-barang/{id}',['uses' => 'MasterStatusBarangController@delete', 'as' => 'deleteBarang']);

		Route::get('/master-user',['uses' => 'MasterUserController@index', 'as' => 'masterUser']);
		Route::get('/master-cek',['uses' => 'MasterUserController@index_cek', 'as' => 'masterUserCek']);
		Route::post('/save-user',['uses' => 'MasterUserController@save', 'as' => 'saveUser']);
		Route::get('/edit-user',['uses' => 'MasterUserController@edit', 'as' => 'editUser']);
		Route::post('/update-user',['uses' => 'MasterUserController@update', 'as' => 'updateUser']);
		Route::get('/delete-user/{id}',['uses' => 'MasterUserController@delete', 'as' => 'deleteUser']);
		
		Route::get('/village-home',['uses' => 'MasterVillageController@index', 'as' => 'mastervillage']);
		Route::post('/village-save',['uses' => 'MasterVillageController@save', 'as' => 'saveVillage']);
		Route::get('/village/edit',['uses' => 'MasterVillageController@edit', 'as' => 'village.edit']);
		Route::post('/village/update',['uses' => 'MasterVillageController@update', 'as' => 'updateVillage']);
		Route::get('/village/delete/{id}',['uses' => 'MasterVillageController@delete', 'as' => 'village.delete']);

		//Menu Admin

		//CONFIG MENU
		Route::get('/config/menu', ['uses' =>'configController@menu','as'=>'menu.index']);
		Route::post('/config/menu-save', ['uses' =>'configController@menuSave','as'=>'config.menuSave']);
		Route::post('/config/menu-update', ['uses' =>'configController@menuUpdate','as'=>'config.menuUpdate']);
		Route::get('/config/menu-view', ['uses' =>'configController@menuView','as'=>'config.menuView']);
		Route::get('/config/menu-edit/{id}', ['uses' =>'configController@menuEdit','as'=>'config.menuEdit']);
		Route::get('/config/menu-delete/{id}', ['uses' =>'configController@menuDelete','as'=>'config.menuDelete']);
		Route::get('/config/menu-viewIcon', ['uses' =>'configController@menuViewIcon','as'=>'config.menuViewIcon']);
		
		//CONFIG ROLE
		Route::get('/config/role', ['uses' =>'configController@menuRole','as'=>'role.index']);
		Route::get('/config/roleMenu', ['uses' =>'configController@reloadMenu','as'=>'config.reloadMenu']);
		Route::get('/config/roleMenu', ['uses' =>'configController@reloadMenu','as'=>'config.reloadMenu']);
		Route::post('/config/role-save', ['uses' =>'configController@roleSave','as'=>'config.roleSave']);
		 
		 //CONFIG JABATAN
		
		Route::get('/jabatan', ['uses' =>'jabatanController@index','as'=>'jabatan.index']);
		Route::post('/jabatan-save', ['uses' =>'jabatanController@save','as'=>'jabatan.save']);
		Route::post('/jabatan-update', ['uses' =>'jabatanController@update','as'=>'jabatan.update']);
		Route::get('/jabatan-ajax', ['uses' =>'jabatanController@indexAjax','as'=>'jabatan.indexAjax']);
		Route::get('/jabatan-delete/{id}', ['uses' =>'jabatanController@delete','as'=>'jabatan.delete']);
		Route::get('/jabatan-edit/{id}', ['uses' =>'jabatanController@edit','as'=>'jabatan.edit']);

		Route::get('/user-form/', ['uses' =>'MasterUserAdmController@index','as'=>'user']);
		Route::post('/save-adm/', ['uses' =>'MasterUserAdmController@save','as'=>'saveUserAdm']);
		Route::get('/edit-adm/', ['uses' =>'MasterUserAdmController@edit','as'=>'editUserAdm']);
		Route::post('/update-adm/', ['uses' =>'MasterUserAdmController@update','as'=>'updateAdm']);
		Route::get('/delete-adm/', ['uses' =>'MasterUserAdmController@delete','as'=>'deleteAdm']);

	});



});
