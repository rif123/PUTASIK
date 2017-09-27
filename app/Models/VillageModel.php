<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;
use DB;

class VillageModel extends Model
{
	protected $table = 't_village';
	protected $primaryKey = 'id_village';
	public $timestamps = false;
	protected $fillable = ['id_village','name_village','id_districts','creator','created','editor','edited'];

	public static function getAllData(){

		$query = "Select * from t_village LEFT JOIN t_districts ON t_village.id_districts = t_districts.id_districts";

		$listData = \DB::Select($query);
		return $listData;
	}

	public static function getDataEdit($id_village){
		$query = "Select * from t_village LEFT JOIN t_districts ON t_village.id_districts = t_districts.id_districts where id_village = '".$id_village."' ";

		$listData = \DB::Select($query);
		return $listData;
	}
}
