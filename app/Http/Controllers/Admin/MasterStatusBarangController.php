<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BarangModel;  // untuk memanggil model
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class MasterStatusBarangController extends Controller
{
   public function index(){
   	$getData['listData'] = BarangModel::get()->toArray();
   	return view('MasterBarangView',$getData);
   }

   public function save(){
    $rules=[
            'barang'=>'required|max::100',
             ];
     $messages=[
            'barang.required'=>config('constants.ERROR_JML_WAJIB'),
              ];
        $validator=Validator::make(Input::all(), $rules, $messages);
        if ($validator->passes()) {

   	  	$getData = Input::all();
        $getInsert = new BarangModel;
        $getInsert->name_status_barang = Input::get('barang');
        $getInsert->save();
        \Session::flash('insertSuccess', 'SUCCSESS');
        return redirect(route('masterStatusBarang'));
      }else{
        \Session::flash('insertError', 'Please input your data !!');
        return redirect(route('masterStatusBarang'));
      }
   }

   public function edit(){
   		$getData = Input::get('id');
   		
   		$getEdit['accept'] = BarangModel::where('id_status_barang',$getData)->get();
   		$getEdit['listData'] = BarangModel::get()->toArray();

   		return view('MasterBarangView',$getEdit);
   }

   public function update(){
   		$getData = Input::all();
   		
   		$getInsert = BarangModel::find(Input::get('id_barang'));
   		$getInsert->name_status_barang = $getData['barang'];
   		$getInsert->update();

   		return redirect(route('masterStatusBarang'));
   }

   public function delete($id_status_barang){
      $getDelete = BarangModel::find($id_status_barang);
   		$getDelete->delete();

   		return redirect(route('masterStatusBarang')); 
   }
}
