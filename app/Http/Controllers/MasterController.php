<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MasterWilayah;
use App\NodeSensor;

class MasterController extends Controller
{
   public function node_sensor_index()
   {
   		$data 		= NodeSensor::all();
   		$wilayah 	= MasterWilayah::all();
   		return view('backend.master.node_sensor', compact('data', 'wilayah'));
   }

   public function node_sensor_tambah(Request $request)
   {
   		$tahun = date('Ymd');
   		$input = $request->only('nama', 'wilayah_id');
   		$input['kode_alat'] = str_replace(' ', '', $input['nama']."_".$tahun);
   		
   		$tambah = NodeSensor::create($input);

   		return redirect()->back()->with('tambah', true);
   }

   public function node_sensor_ubah(Request $request)
   {
   		$input = $request->only('id', 'nama', 'wilayah_id');
   		$ubah = NodeSensor::find($input['id'])->update($input);
   		return redirect()->back()->with('ubah', true);
   }

   public function node_sensor_hapus(Request $request)
   {
   		$data = $request->only('id');
   		$hapus = NodeSensor::find($data['id'])->delete();

   		return redirect()->back()->with('hapus', true);
   }


   // logic untuk master wilayah
   public function wilayah_index()
   {
   		$data = MasterWilayah::all();
   		return view('backend.master.wilayah', compact('data'));
   }

   public function wilayah_tambah(Request $request)
   {
   		$input = $request->only('wilayah');
   		$tambah = MasterWilayah::create($input);

   		return redirect()->back()->with('tambah', true);
   }

   public function wilayah_ubah(Request $request, $id)
   {
   		$input = $request->only('wilayah');
   		$ubah = MasterWilayah::find($id)->update($input);

   		return redirect()->back()->with('ubah', true);
   }

   public function wilayah_hapus($id)
   {
   		$data = MasterWilayah::find($id)->delete();
   		return redirect()->back()->with('hapus', true);
   }

}
