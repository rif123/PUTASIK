<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;
use DB;

class JenisModel extends Model
{
    protected $table = 'm_jenis';
	protected $primaryKey = 'id_jenis';
	public $timestamps = false;
	protected $fillable = ['id_jenis','name_jenis','creator','created','editor','edited'];
}
