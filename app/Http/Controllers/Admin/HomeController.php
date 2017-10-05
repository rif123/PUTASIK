<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KotaModel;  // untuk memanggil model
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function index(){
        $showData['listData'] = KotaModel::all();

        return view('Home',$showData);
    }
  public function indexAjax(){
    	$draw=$_REQUEST['draw'];
        $length=$_REQUEST['length'];
        $start=$_REQUEST['start'];
        $search=$_REQUEST['search']["value"];
        // ======= count ===== //
        $queryCount =KotaModel::all();
        $query = KotaModel::all();
        $total=count($queryCount);
        // ======= count ===== //

        $output=array();
        // $output['draw']=$draw;
        $output['recordsTotal']=$output['recordsFiltered']=$total;
        $output['data']=array();

        $list = [];
        $no =1;
        foreach ($query as $key => $row) {
            $json['no'] = $no;
            $json['name_city'] = $row->name_city;
            $json['id_city'] = $row->id_city;
            $list[] = $json;
            $no++;
        }

        $output['data']  = $list;
        echo json_encode($output);

    }

    public function logout(){
    	\Session::forget('key');
    	return redirect('login');
    }

    public function inputCityProcees(){
        $rules=[
            'name_kota'=>'required',
             ];
        $messages=[
            'name_kota.required'=>config('constants.ERROR_JML_WAJIB'),
        ];
        $validator=Validator::make(Input::all(), $rules, $messages);
        if ($validator->passes()) {

        	$getCity = Input::all();
        	$getData = new KotaModel;
            $getData->name_city = $getCity['name_kota'];
        	$getData->save();
            \Session::flash('insertKotaSuccess', 'SUCCSESS');
        	return redirect(route('home'));
        }else{
            \Session::flash('insertKotaError', 'Please input your data!');
           return \Redirect::to(route('home'));
        }
    }

    public function deleteCity($id_city){
    	
        $getDelet = KotaModel::find($id_city);
    	$getDelet->delete();

    	return redirect('admin');
    }

    public function editCity($id_city){

    	$getExport['acceptData'] = KotaModel::where('id_city',$id_city)->get()->toArray();
    	$getExport['listData'] = KotaModel::all();
    	return view('home',$getExport);
    }

    public function update(){
    	$getData = Input::all();
    	$getUpdate = KotaModel::find(Input::get('id_namaKota'));
    	$getUpdate->name_city = $getData['name_kota'];
    	$getUpdate->update();

    	return redirect(route('home'));
    }
}
