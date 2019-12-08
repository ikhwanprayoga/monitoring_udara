<?php

namespace App\Http\Controllers\mobile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;

use App\Data;
use App\MasterWilayah;
use App\DataPermenit;
use App\KategoriUdara;

class DataController extends Controller
{
    public function index()
    {
        $wilayah = MasterWilayah::all();
        $today = date('Y-m-d');
        $data = Data::where('created_at', 'LIKE', '%'.$today.'%')
                    // ->select('id', 'pm10', 'co', 'asap', 'suhu', 'kelembapan', 'kategori_udara_id', 'created_at', 'updated_at')
                    // ->cast(pm10 as decimal(10,2))
                    ->orderBy('id', 'asc')
                    ->get();
        
        return view('mobile.data.index', compact('data', 'wilayah'));
    }

    public function detail()
    {
        $wilayah = MasterWilayah::all();
        return view('mobile.data.detail', compact('wilayah'));
    }

    public function getData_ringkasan(Request $request)
    {
        $today = date('Y-m-d');
        // $data = Data::where('created_at', 'like', '%'.$today.'%')
        //             ->orderBy('id', 'asc')
        //             ->get();
        $data = Data::join('node_sensor', 'node_sensor.id', '=', 'data.node_sensor_id')
                    ->join('master_wilayah', 'master_wilayah.id', '=', 'wilayah_id')
                    ->select([
                        'node_sensor.id',
                        'node_sensor.nama',
                        'node_sensor.wilayah_id',
                        'master_wilayah.wilayah',
                        'data.*',
                    ])
                    ->where('data.created_at', 'like', '%'.$today.'%');

        if ($request->has('wilayah') && $request->wilayah != null) {
            $data->where('wilayah_id', $request->wilayah);
        }

        return Datatables::of($data)
        ->addColumn('waktu', function ($data){
            return 'Pukul '.$data->waktu.' , '.date('d-m-Y', strtotime($data->created_at));
        })
        ->addColumn('kualitas', function ($data){
            if ($data->kategori_udara_id == 1) {
                return '<a class="badge badge-success" data-toggle="modal" href="#modal_rincian"
                        data-id="'.$data->id.'"
                        data-pm10="'.$data->pm10.'"
                        data-co="'.$data->co.'"
                        data-asap="'.$data->asap.'"
                        data-suhu="'.$data->suhu.'"
                        data-kelembapan="'.$data->kelembapan.'"
                        data-kategori_udara_id="'.$data->kategori_udara_id.'"
                >Baik</a>';
            }elseif ($data->kategori_udara_id == 2) {
                return '<div class="badge badge-info" data-toggle="modal" href="#modal_rincian"
                        data-id="'.$data->id.'"
                        data-pm10="'.$data->pm10.'"
                        data-co="'.$data->co.'"
                        data-asap="'.$data->asap.'"
                        data-suhu="'.$data->suhu.'"
                        data-kelembapan="'.$data->kelembapan.'"
                        data-kategori_udara_id="'.$data->kategori_udara_id.'"
                >Sedang</div>';
            }elseif ($data->kategori_udara_id == 3) {
                return '<div class="badge badge-warning" data-toggle="modal" href="#modal_rincian"
                        data-id="'.$data->id.'"
                        data-pm10="'.$data->pm10.'"
                        data-co="'.$data->co.'"
                        data-asap="'.$data->asap.'"
                        data-suhu="'.$data->suhu.'"
                        data-kelembapan="'.$data->kelembapan.'"
                        data-kategori_udara_id="'.$data->kategori_udara_id.'"
                >Tidak Sehat</div>';
            }elseif ($data->kategori_udara_id == 4) {
                return '<div class="badge badge-danger" data-toggle="modal" href="#modal_rincian"
                        data-id="'.$data->id.'"
                        data-pm10="'.$data->pm10.'"
                        data-co="'.$data->co.'"
                        data-asap="'.$data->asap.'"
                        data-suhu="'.$data->suhu.'"
                        data-kelembapan="'.$data->kelembapan.'"
                        data-kategori_udara_id="'.$data->kategori_udara_id.'"
                >Sangat Tidak Sehat</div>';
            }else  {
                return '<div class="badge badge-primary" data-toggle="modal" href="#modal_rincian"
                        data-id="'.$data->id.'"
                        data-pm10="'.$data->pm10.'"
                        data-co="'.$data->co.'"
                        data-asap="'.$data->asap.'"
                        data-suhu="'.$data->suhu.'"
                        data-kelembapan="'.$data->kelembapan.'"
                        data-kategori_udara_id="'.$data->kategori_udara_id.'"
                >Berbahaya</div>';
            }
        })
        ->addIndexColumn()
        ->rawColumns(['kualitas', 'waktu', 'DT_RowIndex'])
        ->make(true);
    }

    public function getData_detail(Request $request)
    {
        // $data = Data::select(['id','pm10','co','asap','suhu','kelembapan','created_at','waktu','kategori_udara_id'])->orderBy('id', 'asc');
        $data = Data::join('node_sensor', 'node_sensor.id', '=', 'data.node_sensor_id')
                    ->join('master_wilayah', 'master_wilayah.id', '=', 'wilayah_id')
                    ->select([
                        'node_sensor.id',
                        'node_sensor.nama',
                        'node_sensor.wilayah_id',
                        'master_wilayah.wilayah',
                        'data.*',
                    ]);

        if ($request->has('mulai') && $request->has('akhir') && $request->mulai != null && $request->akhir != null ) {
            $data->whereBetween('created_at', [$request->mulai, $request->akhir]);
        }

        if ($request->has('wilayah') && $request->wilayah != null) {
            $data->where('wilayah_id', $request->wilayah);
        }

        return Datatables::of($data)
        ->addColumn('waktu', function ($data){
            return 'Pukul '.$data->waktu.' , '.date('d-m-Y', strtotime($data->created_at));
        })
        ->addColumn('kualitas', function ($data){
            if ($data->kategori_udara_id == 1) {
                return '<a class="badge badge-success" data-toggle="modal" href="#modal_rincian"
                        data-id="'.$data->id.'"
                        data-pm10="'.$data->pm10.'"
                        data-co="'.$data->co.'"
                        data-asap="'.$data->asap.'"
                        data-suhu="'.$data->suhu.'"
                        data-kelembapan="'.$data->kelembapan.'"
                        data-kategori_udara_id="'.$data->kategori_udara_id.'"
                >Baik</a>';
            }elseif ($data->kategori_udara_id == 2) {
                return '<div class="badge badge-info" data-toggle="modal" href="#modal_rincian"
                        data-id="'.$data->id.'"
                        data-pm10="'.$data->pm10.'"
                        data-co="'.$data->co.'"
                        data-asap="'.$data->asap.'"
                        data-suhu="'.$data->suhu.'"
                        data-kelembapan="'.$data->kelembapan.'"
                        data-kategori_udara_id="'.$data->kategori_udara_id.'"
                >Sedang</div>';
            }elseif ($data->kategori_udara_id == 3) {
                return '<div class="badge badge-warning" data-toggle="modal" href="#modal_rincian"
                        data-id="'.$data->id.'"
                        data-pm10="'.$data->pm10.'"
                        data-co="'.$data->co.'"
                        data-asap="'.$data->asap.'"
                        data-suhu="'.$data->suhu.'"
                        data-kelembapan="'.$data->kelembapan.'"
                        data-kategori_udara_id="'.$data->kategori_udara_id.'"
                >Tidak Sehat</div>';
            }elseif ($data->kategori_udara_id == 4) {
                return '<div class="badge badge-danger" data-toggle="modal" href="#modal_rincian"
                        data-id="'.$data->id.'"
                        data-pm10="'.$data->pm10.'"
                        data-co="'.$data->co.'"
                        data-asap="'.$data->asap.'"
                        data-suhu="'.$data->suhu.'"
                        data-kelembapan="'.$data->kelembapan.'"
                        data-kategori_udara_id="'.$data->kategori_udara_id.'"
                >Sangat Tidak Sehat</div>';
            }else  {
                return '<div class="badge badge-primary" data-toggle="modal" href="#modal_rincian"
                        data-id="'.$data->id.'"
                        data-pm10="'.$data->pm10.'"
                        data-co="'.$data->co.'"
                        data-asap="'.$data->asap.'"
                        data-suhu="'.$data->suhu.'"
                        data-kelembapan="'.$data->kelembapan.'"
                        data-kategori_udara_id="'.$data->kategori_udara_id.'"
                >Berbahaya</div>';
            }
        })
        ->addIndexColumn()
        ->rawColumns(['kualitas','waktu', 'DT_RowIndex'])
        ->make(true);
    }
}
