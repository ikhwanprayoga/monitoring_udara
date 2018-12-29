<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Data;
use App\MasterWilayah;
use App\NodeSensor;

class BerandaController extends Controller
{
    public function index()
    {
    	$date = date('Y-m-d');
		$data = Data::where('created_at', 'LIKE', '%' .$date. '%')->get();
		$wilayah = MasterWilayah::all();
		$sensor = NodeSensor::all();
    	
		// show data sensor perwilayah
		foreach ($wilayah as $key => $value) {
			$data_wilayah[$key] = $value->wilayah;
		}

		$node_perwilayah = $this->chartWilayah();

    	return view('backend.beranda.index', compact('data', 'wilayah', 'sensor', 'data_wilayah', 'node_perwilayah'));
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
