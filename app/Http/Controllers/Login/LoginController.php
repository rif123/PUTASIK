<?php

namespace App\Http\Controllers\Login;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\LoginModel as lm;  // untuk memanggil model
use Illuminate\Support\Facades\Input;

class LoginController extends Controller
{
   public function index(){
   	return view('Loginview');
   }

   public function LoginProcess(){
   		
   		$get_email = Input::get('email'); 
		$get_password = md5(Input::get('password'));
		$query = lm::getUser($get_email,$get_password);
		$js = json_decode(json_encode($query),true);
		$allDataAuth = !empty($js) ? $js : '';

		// print_r($js); die;
		if(empty($allDataAuth)){
			
			return \Redirect::to(route('login'));
		}else{
			$session = \Session::put('key',$allDataAuth);
			return \Redirect::to(route('home'));
		}

   }


}
