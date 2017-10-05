<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\VillageModel;  
use App\Models\DistrictsModel as dm;  
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class MasterVillageController extends Controller
{
    public function index(){
    	$getData['showData'] = dm::all()->toArray();
    	$getData['allData'] = VillageModel::getAllData();
    	return view('MasterVillageView',$getData);
    }

    public function save(){
     $rules=[
            'village'=>'required',
            'selectDistricts'=>'required',
             ];
     $messages=[
            'village.required'=>config('constants.ERROR_JML_WAJIB'),
            'selectDistricts.required'=>config('constants.ERROR_JML_WAJIB'),
              ];
        $validator=Validator::make(Input::all(), $rules, $messages);
        if ($validator->passes()) {

        	$getData = Input::all();
    	  	$getInsert = new VillageModel;
    	  	$getInsert->name_village = $getData['village'];
    	  	$getInsert->id_districts = $getData['selectDistricts'];
    	  	$getInsert->save();
            \Session::flash('insertSuccess', 'SUCCES');
            return redirect(route('mastervillage'));
        }else{
            \Session::flash('insertError', 'Please Input Your Data !!');
    	  	return redirect(route('mastervillage'));
        }
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

    public function delete($id_village){
        $getData = VillageModel::find($id_village);
    	$getData->delete();

    	 return redirect(route('mastervillage'));
    }

}
