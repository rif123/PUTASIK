<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KotaModel;  // untuk memanggil model
use Illuminate\Support\Facades\Input;

class HomeController extends Controller
{
    public function index(){
    	$showData['listData'] = KotaModel::all();

    	return view('Home',$showData);
    }

    public function logout(){
    	\Session::forget('key');
    	return redirect('login');
    }

    public function inputCityProcees(){
    	$getCity = Input::all();
        
    	$getData = new KotaModel;
        $getData->name_city = $getCity['name_kota'];
    	$getData->save();

    	return redirect(route('home'));
    }

    public function deleteCity(){
    	$getDelet = KotaModel::find(Input::get('id'));
    	$getDelet->delete();

    	return redirect('admin');
    }

    public function editCity(){
    	$getEdit = Input::get('id');

    	$getExport['acceptData'] = KotaModel::where('id_city',$getEdit)->get()->toArray();
    	$getExport['listData'] = KotaModel::all();
    	return view('home',$getExport);
    }

    public function update(){
    	$getData = Input::all();
    	
    	$getUpdate = KotaModel::find(Input::get('id_namaKota'));
    	$getUpdate->name_city = $getData['name_kota'];
    	$getUpdate->update();

    	return redirect(route('home'));
    }
}
