<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DistrictsModel;  // untuk memanggil model
use App\Models\KotaModel as km;  // untuk memanggil model
use Illuminate\Support\Facades\Input;

class HomeDistrictsController extends Controller
{
  public function index(){
  	$getData['showData'] = km::all()->toArray();
    $getData['allData'] = DistrictsModel::getAllData();
  	return view('districts',$getData);
  }

  public function saveDistricts(){
  	$getData = Input::all();

  	$getInsert = new DistrictsModel;
  	$getInsert->name_districts = $getData['districts'];
  	$getInsert->id_city = $getData['selectName'];
  	$getInsert->save();

  	return redirect(route('districts'));
  }
  public function edit(){
    // print_r(Input::get('id'));die;
      $getEdit  = DistrictsModel::getDataEdit(Input::get('id'));
      $getData['editData'] = json_decode(json_encode($getEdit),true); 
      $getData['showData'] = km::all()->toArray();
      $getData['allData'] = DistrictsModel::getAllData();
      return view('districts',$getData);
  }
  public function update(){
    $getData = Input::all();
    
     $getInsert = DistrictsModel::find($getData['id_districts']);
     $getInsert->name_districts = $getData['districts'];
     $getInsert->id_city = $getData['selectName'];
     $getInsert->update();

     return redirect(route('districts'));
  }
   public function delete(){
     $getInsert = DistrictsModel::find(Input::get('id'));
     $getInsert->delete();

     return redirect(route('districts')); 
   }
 
}
