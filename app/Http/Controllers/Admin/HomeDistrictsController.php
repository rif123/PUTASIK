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
}
