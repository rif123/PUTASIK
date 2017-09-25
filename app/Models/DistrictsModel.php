<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;
use DB;

class DistrictsModel extends Model
{
    protected $table = 't_districts';
	protected $primaryKey = 'id_districts';
	public $timestamps = false;
	protected $fillable = ['id_districts','name_districts','id_kota'];
}
