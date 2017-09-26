<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;
use DB;

class LoginModel extends Model
{
    protected $table = 'users';
	protected $primaryKey = 'iduser';
	public $timestamps = false;
	protected $fillable = ['email','password','creator','created','editor','edited','id_type_user'];

	public static function getUser($get_email,$get_password){
		

		$query = 'select * from users where email = "'.$get_email.'" and password = "'.$get_password.'"';

	    $db = \DB::select($query);
	   	return $db;
	}
}
