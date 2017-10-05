<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UserAdmModel;  // untuk memanggil model
use Illuminate\Support\Facades\Input;

class MasterUserAdmController extends Controller
{
   public function index(){
   		$getData['listData'] = UserAdmModel::get()->toArray();
   		return view('MasterUserAdmView',$getData);
   }

   public function save(){
   		$getData = Input::all();

        $getInsert = new UserAdmModel;
        $getInsert->email = $getData['email'];
        $getInsert->password = md5(Input::get('password'));
        $getInsert->save();

        return redirect(route('user'));
   }

   public function edit(){
   		$getData = Input::get('id');
   		
   		$getEdit['accept'] = UserAdmModel::where('id_user',$getData)->get();
   		$getEdit['listData'] = UserAdmModel::get()->toArray();

   		return view('MasterUserAdmView',$getEdit);
   }

   public function update(){
   		$getData = Input::all();
   		
   		$getInsert = UserAdmModel::find(Input::get('id'));
   		$getInsert->email = $getData['email'];
   		$getInsert->password = md5(Input::get('password'));
   		$getInsert->update();

   		return redirect(route('user'));
   }

   public function delete(){
		$getDelete = UserAdmModel::find(Input::get('id'));
		$getDelete->delete();

		return redirect(route('user'));	   	
   }

}
