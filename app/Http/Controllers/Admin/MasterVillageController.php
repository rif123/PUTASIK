<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\VillageModel;  
use App\Models\DistrictsModel as dm;  
use Illuminate\Support\Facades\Input;

class MasterVillageController extends Controller
{
    public function index(){
    	$getData['showData'] = dm::all()->toArray();
    	$getData['allData'] = VillageModel::getAllData();
    	return view('MasterVillageView',$getData);
    }

    public function save(){
    	$getData = Input::all();

	  	$getInsert = new VillageModel;
	  	$getInsert->name_village = $getData['village'];
	  	$getInsert->id_districts = $getData['selectDistricts'];
	  	$getInsert->save();

	  	return redirect(route('mastervillage'));
    }

    public function edit(){
	      $getEdit  = VillageModel::getDataEdit(Input::get('id'));
	      $getData['editData'] = json_decode(json_encode($getEdit),true);
	      $getData['showData'] = dm::all()->toArray();
    	  $getData['allData'] = VillageModel::getAllData();
	      return view('MasterVillageView',$getData);
    }

    public function update(){
    	 $getData = Input::all();
	     $getInsert = VillageModel::find($getData['id_v']);
	     $getInsert->name_village = $getData['village'];
	     $getInsert->id_districts = $getData['selectDistricts'];
	     $getInsert->update();

	     return redirect(route('mastervillage'));
    }

    public function delete(){
    	$getData = VillageModel::find(Input::get('id'));
    	$getData->delete();

    	 return redirect(route('mastervillageft'));
    }

}
