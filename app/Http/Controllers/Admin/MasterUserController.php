<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UserModel;  // untuk memanggil model
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class MasterUserController extends Controller
{
    public function index(){
      $getData['listData'] = UserModel::get()->toArray();
      return view('MasterUserView',$getData);
   }
    public function index_cek(){
	   	
	   	return view('view_cek');
   }
   public function save(){
     $rules=[
            'user'=>'required',
             ];
     $messages=[
            'user.required'=>config('constants.ERROR_JML_WAJIB'),
              ];
        $validator=Validator::make(Input::all(), $rules, $messages);
        if ($validator->passes()) {

        $getData = Input::all();
        $getInsert = new UserModel;
        $getInsert->name_type = Input::get('user');
        $getInsert->save();
        \Session::flash('insertSuccess', 'SUCCES');
        return redirect(route('masterUser'));
      }else{
        \Session::flash('insertError', 'Please input your data');
        return redirect(route('masterUser'));
      }
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

   public function delete($id_type_user){
      $getDelete = UserModel::find($id_type_user);
   		$getDelete->delete();

   		return redirect(route('masterUser'));
   }
   
}
