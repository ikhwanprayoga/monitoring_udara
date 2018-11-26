<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Response;

use App\DataSementara;
use App\Monitoring;


class RealtimeController extends Controller
{
    public function index()
    {

    	return view('backend.data.realtime');
    }

    public function data(Request $request, $kode_alat, $pm10, $co, $asap, $suhu, $kelembapan)
    {
    	// $input = $request->only('kode_alat', 'pm10', 'co', 'asap', 'suhu', 'kelembapan');
    	$input['kode_alat'] = $request->kode_alat;
    	$input['pm10'] 		= $request->pm10;
    	$input['co'] 		= $request->co;
    	$input['asap'] 		= $request->asap;
    	$input['suhu'] 		= $request->suhu;
    	$input['kelembapan'] = $request->kelembapan;

    	$simpan = DataSementara::create($input);

    	return redirect()->back();

    }

    public function getData(Request $request)
    {
    	$data = DataSementara::select('id','kode_alat','pm10','co','asap','suhu','kelembapan','created_at', 'updated_at')->orderBy('id', 'desc');

    	return Datatables::of($data)->make(true);
    }

    public function grafik()
    {
    	$data = Monitoring::all();
        return Response::json($data, 200);
    }
}
