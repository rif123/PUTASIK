<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BarangModel;  // untuk memanggil model
use Illuminate\Support\Facades\Input;

class MasterStatusBarangController extends Controller
{
   public function index(){
   	$getData['listData'] = BarangModel::get()->toArray();
   	return view('MasterBarangView',$getData);
   }

   public function save(){
   		$getData = Input::all();

        $getInsert = new BarangModel;
        $getInsert->name_status_barang = Input::get('barang');
        $getInsert->save();

        return redirect(route('masterStatusBarang'));
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

   public function delete(){
   		$getDelete = BarangModel::find(Input::get('id'));
   		$getDelete->delete();

   		return redirect(route('masterStatusBarang')); 
   }
}
