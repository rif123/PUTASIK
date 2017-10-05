<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;
use DB;

class UserAdmModel extends Model
{
    protected $table = 'users';
	protected $primaryKey = 'id_user';
	public $timestamps = false;
	protected $fillable = ['id_user','email','password','creator','created','editor','edited','id_type_user'];
}
