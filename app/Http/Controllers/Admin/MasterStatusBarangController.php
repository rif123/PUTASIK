<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BarangModel;  // untuk memanggil model
use Illuminate\Support\Facades\Input;

class MasterStatusBarangController extends Controller
{
   public function index(){
   	return view('MasterBarangView');
   }

   public function save(){
   		$getData = Input::all();

        $getInsert = new BarangModel;
        $getInsert->name_status_barang = Input::get('barang');
        $getInsert->save();

        return redirect(route('masterStatusBarang'));
   }
}
