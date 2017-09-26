<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;
use DB;

class StatusModel extends Model
{
    protected $table = 'm_status';
	protected $primaryKey = 'id_status';
	public $timestamps = false;
	protected $fillable = ['id_status','name_status','creator','created','editor','edited'];
}
