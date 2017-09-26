<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\JenisModel;  // untuk memanggil model
use Illuminate\Support\Facades\Input;

class MasterJenisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Data['listData'] = JenisModel::get(); 
        return view('MasterJenisView',$Data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function saveJenis()
    {
        $getData = Input::all();
        
        $getInsert = new JenisModel;
        $getInsert->name_jenis = $getData['jenis'];
        $getInsert->save();

        return redirect(route('masterJenis'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   
    public function editData()
    {
        $getDataEdit = Input::get('id');

        $getExport['accept'] = JenisModel::where('id_jenis',$getDataEdit)->get()->toArray();
        $getExport['listData'] = JenisModel::get();

        return view('masterJenisView',$getExport);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        $getData = Input::all();
        
        $getUpdate = JenisModel::find(Input::get('id'));
        $getUpdate->name_jenis = $getData['jenis'];
        $getUpdate->update();

        return redirect(route('masterJenis'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete()
    {
        $getDelet = JenisModel::find(Input::get('id'));
        $getDelet->delete();

        return redirect(route('masterJenis'));
    }
}
