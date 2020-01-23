<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\Data;
use App\MasterWilayah;
use App\NodeSensor;
use App\User;

class BerandaController extends Controller
{
    public function index()
    {
    	$date = date('Y-m-d');
		// return $data = Data::where('created_at', 'LIKE', '%' .$date. '%')->get();
		$data = Data::where('tanggal', 'LIKE', '%' .$date. '%')
							->select(
								'waktu',
								DB::raw('AVG(pm10) as pm10'), 
								DB::raw('AVG(co) as co'), 
								DB::raw('AVG(suhu) as suhu'), 
								DB::raw('AVG(kelembapan) as kelembapan')
							)
							->groupBy('waktu')
							->orderBy('id', 'asc')
							->get();
		$wilayah = MasterWilayah::all();
		$sensor = NodeSensor::all();
		$user = User::all();
    	
		// show data sensor perwilayah
		foreach ($wilayah as $key => $value) {
			$data_wilayah[$key] = $value->wilayah;
		}

		$node_perwilayah = $this->chartWilayah();

    	return view('backend.beranda.index', compact('data', 'wilayah', 'sensor', 'data_wilayah', 'node_perwilayah', 'user'));
	}
	
	private function chartWilayah()
	{
		$wilayah = MasterWilayah::pluck('id')->toArray();

		foreach ($wilayah as $value) {
			$data['wilayah'][] = $value;
			$data['node_perwilayah'][] = NodeSensor::where('wilayah_id', $value)->count();
		}

		return $data;
	}
}
