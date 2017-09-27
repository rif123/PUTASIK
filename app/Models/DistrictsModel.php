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
	protected $fillable = ['id_districts','name_districts','id_city'];


	public static function getAllData (){

		$query = "Select *from t_districts
				LEFT JOIN t_city ON t_districts.id_city = t_city.id_city";
	
		$listData = \DB::Select($query);
		return $listData;
	}	
	public static function getDataEdit ($id_districts){

		$query = "Select *from t_districts
				LEFT JOIN t_city ON t_districts.id_city = t_city.id_city
				WHERE id_districts = '".$id_districts."' ";
	
		$listData = \DB::Select($query);
		return $listData;
	}
}
