<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\StatusModel;  // untuk memanggil model
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class MasterStatusController extends Controller
{
   public function index(){
   		$Data['listData'] = StatusModel::get();	
   		return view('MasterStatusView',$Data);
   }
   public function save(){
     $rules=[
            'status'=>'required',
             ];
     $messages=[
            'status.required'=>config('constants.ERROR_JML_WAJIB'),
              ];
        $validator=Validator::make(Input::all(), $rules, $messages);
        if ($validator->passes()) {

     	  	$getData = Input::all();
          $getInsert = new StatusModel;
          $getInsert->name_status = $getData['status'];
          $getInsert->save();
          \Session::flash('insertKotaSuccess', 'SUCCSESS');
          return redirect(route('masterStatus'));
        }else{
          \Session::flash('insertKotaError', 'Please input your data! ');
          return redirect(route('masterStatus'));
        }
   }
   public function edit(){
   		$getEdit = Input::get('id');

        $getExport['accept'] = StatusModel::where('id_status',$getEdit)->get()->toArray();
        $getExport['listData'] = StatusModel::get();

        return view('MasterStatusView',$getExport);
   }
   public function update(){
   		  $getData = Input::all();
        
        $getUpdate = StatusModel::find(Input::get('id'));
        $getUpdate->name_status = $getData['status'];
        $getUpdate->update();

        return redirect(route('masterStatus'));
   }
   public function delete($id_status){     
        $getDelet = StatusModel::find($id_status);
        $getDelet->delete();

        return redirect(route('masterStatus'));
   }
}
