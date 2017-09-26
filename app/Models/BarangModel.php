<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;
use DB;

class BarangModel extends Model
{
    protected $table = 'm_status_barang';
	protected $primaryKey = 'id_status_barang';
	public $timestamps = false;
	protected $fillable = ['id_status_barang','name_status_barang','creator','created','editor','edited'];
}
