<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;
use DB;

class KotaModel extends Model
{
    protected $table = 't_city';
	protected $primaryKey = 'id_city';
	public $timestamps = false;
	protected $fillable = ['name_city'];
}
