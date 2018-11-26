<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Monitoring;
use App\DataSementara;
use App\Data;


class MonitoringController extends Controller
{
    public function monitoring(Request $request, $kode_alat, $pm10, $co, $asap, $suhu, $kelembapan)
    {
    	$input['kode_alat'] = $request->kode_alat;
    	$input['pm10'] 		= $request->pm10;
    	$input['co'] 		= $request->co;
    	$input['asap'] 		= $request->asap;
    	$input['suhu'] 		= $request->suhu;
    	$input['kelembapan'] = $request->kelembapan;

    	$cek_kode_alat = Monitoring::where('kode_alat', $input['kode_alat'])->first();

    	if (empty($cek_kode_alat)) {
    		$simpan = Monitoring::create($input);
    		// return "data baru";
    		return redirect()->back();
    	}

    	if (isset($cek_kode_alat)) {
	    	$id 		= $cek_kode_alat->id;
	    	$kode_alat 	= $cek_kode_alat->kode_alat;
    		$update = Monitoring::find($id)->update($input);
    		// return "data di update";
    		return redirect()->back();
    	}
    }

    public function store()
    {
    	$data = Monitoring::all();
    	foreach ($data as $key => $value) {
    		Data::create([
    			'kode_alat' => $value->kode_alat,
    			'pm10' 		=> $value->pm10,
    			'co' 		=> $value->co,
    			'asap' 		=> $value->asap,
    			'suhu' 		=> $value->suhu,
    			'kelembapan' => $value->kelembapan,
    		]);
    	}
    }
}
