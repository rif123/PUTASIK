<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;
use DB;

class UserModel extends Model
{
    protected $table = 'm_type_user';
	protected $primaryKey = 'id_type_user';
	public $timestamps = false;
	protected $fillable = ['id_type_user','name_type','creator','created','editor','edited'];
}
