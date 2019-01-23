<?php

namespace App\Http\Controllers\mobile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;

use App\Data;
use App\DataSementara;
use App\DataPermenit;
use App\KategoriUdara;

class DataController extends Controller
{
    public function index()
    {
        $today = date('Y-m-d');
        $data = Data::where('created_at', 'LIKE', '%'.$today.'%')->orderBy('id', 'asc')->get();
        
        return view('mobile.data.index', compact('data'));
    }

    public function getData_ringkasan(Request $request)
    {
        $today = date('Y-m-d');
        $data = Data::where('created_at', 'like', '%'.$today.'%')
                    ->get();

        return Datatables::of($data)
        ->editColumn('created_at', function ($data){
            return date('H:i:s', strtotime($data->created_at));
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
                return '<div class="badge badge-primary" data-toggle="modal" href="#modal_rincian"
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
                return '<div class="badge badge-dark" data-toggle="modal" href="#modal_rincian"
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
        ->rawColumns(['kualitas'])
        ->make(true);
    }

    public function getData_detail(Request $request)
    {
        $data = Data::all();

        return Datatables::of($data)->make(true);
    }
}
