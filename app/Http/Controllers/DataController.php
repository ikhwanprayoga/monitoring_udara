<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Data;

class DataController extends Controller
{
    public function index()
    {
    	return view('backend.data.data');
    }

    public function getData(Request $request)
    {
    	$data = Data::select('id','kode_alat','pm10','co','asap','suhu','kelembapan','kategori_udara_id');

    	return Datatables::of($data)->make(true);
    }
}
