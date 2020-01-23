<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;

use App\Data;
use App\NodeSensor;
use App\MasterWilayah;
use App\KategoriUdara;

class DataController extends Controller
{
    public function index()
    {
        $kategori_udara = KategoriUdara::all();
        $sensor = NodeSensor::all();
        $wilayah = MasterWilayah::all();
    	return view('backend.data.index', compact('kategori_udara', 'sensor', 'wilayah'));
    }

    public function getData(Request $request)
    {
        // $data = Data::with('nodeSensor')->orderBy('id', 'asc');
        // $node = NodeSensor::join('master_wilayah', 'master_wilayah.id', '=', 'node_sensor.wilayah_id');
        $data = Data::join('node_sensor', 'node_sensor.id', '=', 'data.node_sensor_id')
                    ->join('master_wilayah', 'master_wilayah.id', '=', 'wilayah_id')
                    ->select([
                        'node_sensor.id',
                        'node_sensor.nama',
                        'node_sensor.wilayah_id',
                        'master_wilayah.wilayah',
                        'data.*',
                    ]);

            if ($request->has('mulai') && $request->has('akhir') && $request->mulai != null && $request->akhir != null) {
                $data->whereBetween('tanggal', [$request->mulai, $request->akhir]);
            }

            if ($request->has('kategori_udara') && $request->kategori_udara != null) {
                $data->where('kategori_udara_id', $request->kategori_udara);
            }

            if ($request->has('node_sensor') && $request->node_sensor != null) {
                $data->where('node_sensor_id', $request->node_sensor);
            }

            if ($request->has('wilayah') && $request->wilayah != null) {
                $data->where('wilayah_id', $request->wilayah);
            }

        return Datatables::of($data)
        // ->addColumn('wilayah', function ($data) {
        //     $wilayah = NodeSensor::with('nama_wilayah')->first();

        //     return $wilayah->nama_wilayah->wilayah;
        // })
        ->addColumn('kategori_udara', function ($data) {
            if ($data->kategori_udara_id == 1) {
                return '<div class="badge badge-success">Baik</div>';
            } elseif ($data->kategori_udara_id == 2) {
                return '<div class="badge badge-primary">Sedang</div>';
            } elseif ($data->kategori_udara_id == 3) {
                return '<div class="badge badge-warning">Tidak Sehat</div>';
            } elseif ($data->kategori_udara_id == 4) {
                return '<div class="badge badge-danger">Sangat Tidak Sehat</div>';
            } else {
                return '<div class="badge badge-dark">Berbahaya</div>';
            }
        })
        ->addColumn('waktu', function ($data){
            return 'Pukul '.$data->waktu.' <br> '.date('d-m-Y', strtotime($data->tanggal));
        })
        ->rawColumns(['kategori_udara', 'waktu'])
        ->make(true);
    }
}
