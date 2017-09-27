<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\StatusModel;  // untuk memanggil model
use Illuminate\Support\Facades\Input;

class MasterStatusController extends Controller
{
   public function index(){
   		$Data['listData'] = StatusModel::get();	
   		return view('MasterStatusView',$Data);
   }
   public function save(){
   		$getData = Input::all();

        $getInsert = new StatusModel;
        $getInsert->name_status = $getData['status'];
        $getInsert->save();

        return redirect(route('masterStatus'));
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
   public function delete(){
   		$getDelet = StatusModel::find(Input::get('id'));
        $getDelet->delete();

        return redirect(route('masterStatus'));
   }
}
