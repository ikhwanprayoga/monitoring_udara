<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sensor;
use App\DataSementara;

class SensorController extends Controller
{
    public function tes()
    {
    	$data = Sensor::all();
    	return response()->json($data,200);
    }

    public function kirim(Request $request, $kode_alat, $suhu, $kelembapan, $asap, $co, $pm10)
    {
        return $lama = DataSementara::where('kode_alat', '1')->orderBy('id', 'desc')->first()->created_at->format('Hi');
        return $waktu = \Carbon\Carbon::date();
        $data['kode_alat']  = $request->kode_alat;
        $data['suhu']       = $request->suhu;
        $data['kelembapan'] = $request->kelembapan;
        $data['asap']       = $request->asap;
        $data['co']         = $request->co;
        $data['pm10']       = $request->pm10;

        $simpan =  DataSementara::create($data);

        return redirect()->back();
    }

    public function arduino(Request $request, $id, $suhu, $kelembapan, $asap, $co, $pm10)
    {
        $id         = $request->id;
        $suhu       = $request->suhu;
        $kelembapan = $request->kelembapan;
        $asap       = $request->asap;
        $co       = $request->co;
    	$pm10       = $request->pm10;

    	$data = Sensor::find($id);
        $data->suhu = $request->suhu;
        $data->kelembapan = $request->kelembapan;
        $data->asap = $request->asap;
        $data->co = $request->co;
        $data->pm10 = $request->pm10;

    	$data->update();
    	return redirect('api/tes_sensor');
    }

    public function nilai()
    {
        return view('tes');
    }

    public function node1()
    {
        $data = Sensor::find(1);

        return response()->json($data, 200);
    }

    public function node2()
    {
        $data = Sensor::find(2);

        return response()->json($data, 200);
    }
}
