<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sensor;

class SensorController extends Controller
{
    public function tes()
    {
    	$data = Sensor::all();
    	return response()->json($data,200);
    }

    public function arduino(Request $request, $id, $suhu, $kelembapan, $asap)
    {
        $id         = $request->id;
        $suhu       = $request->suhu;
        $kelembapan = $request->kelembapan;
    	$asap       = $request->asap;

    	$data = Sensor::find($id);
        $data->suhu = $request->suhu;
        $data->kelembapan = $request->kelembapan;
        $data->asap = $request->asap;

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
