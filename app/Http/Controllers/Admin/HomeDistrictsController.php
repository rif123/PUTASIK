<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DistrictsModel;  // untuk memanggil model
use App\Models\KotaModel as km;  // untuk memanggil model
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class HomeDistrictsController extends Controller
{
  public function index(){
  	$getData['showData'] = km::all()->toArray();
    $getData['allData'] = DistrictsModel::getAllData();
  	return view('districts',$getData);
  }

  public function saveDistricts(){
  	$rules=[
            'districts'=>'required',
            'selectName'=>'required',
             ];
    $messages=[
            'districts'=>config('constants.ERROR_JML_WAJIB'),
            'selectName'=>config('constants.ERROR_JML_WAJIB'),
             ];
    $validator=Validator::make(Input::all(), $rules, $messages);
    if ($validator->passes()) {

      $getData = Input::all();
    	$getInsert = new DistrictsModel;
    	$getInsert->name_districts = $getData['districts'];
    	$getInsert->id_city = $getData['selectName'];
    	$getInsert->save();
      \Session::flash('insertDistrictsSuccess', 'SUCCSESS');
  	  return redirect(route('districts'));
     }else{
      \Session::flash('insertDistrictsError', 'Please input your data!');
      return redirect(route('districts'));
    }
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
   public function delete($id_districts){
     $getInsert = DistrictsModel::find($id_districts);
     $getInsert->delete();

     return redirect(route('districts')); 
   }
 
}
