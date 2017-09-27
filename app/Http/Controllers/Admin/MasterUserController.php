<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UserModel;  // untuk memanggil model
use Illuminate\Support\Facades\Input;

class MasterUserController extends Controller
{
    public function index(){
	   	$getData['listData'] = UserModel::get()->toArray();
	   	return view('MasterUserView',$getData);
   }
   public function save(){
   		$getData = Input::all();

        $getInsert = new UserModel;
        $getInsert->name_type = Input::get('user');
        $getInsert->save();

        return redirect(route('masterUser'));
   }
   public function edit(){
   		$getData = Input::get('id');
   		
   		$getEdit['accept'] = UserModel::where('id_type_user',$getData)->get();
   		$getEdit['listData'] = UserModel::get()->toArray();

   		return view('MasterUserView',$getEdit);
   }

   public function update(){
   		$getData = Input::all();
   		
   		$getInsert = UserModel::find(Input::get('id_user'));
   		$getInsert->name_type = $getData['user'];
   		$getInsert->update();

   		return redirect(route('masterUser'));
   }

   public function delete(){
   		$getDelete = UserModel::find(Input::get('id'));
   		$getDelete->delete();

   		return redirect(route('masterUser'));
   }
   
}
