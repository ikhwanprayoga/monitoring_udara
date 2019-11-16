<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;

use App\Data;
use App\DataSementara;
use App\DataPermenit;
use App\KategoriUdara;

class DataController extends Controller
{
    public function index()
    {
        $kategori_udara = KategoriUdara::all();
    	return view('backend.data.index', compact('kategori_udara'));
    }

    public function getData(Request $request)
    {
    	$data = Data::select(['id','pm10','co','suhu','kelembapan','created_at','kategori_udara_id']);

            if ($request->has('mulai') && $request->has('akhir') && $request->mulai != null && $request->akhir != null) {
                $data->whereBetween('created_at', [$request->mulai, $request->akhir]);
            }

            if ($request->has('kategori_udara') && $request->kategori_udara != null) {
                $data->where('kategori_udara_id', $request->kategori_udara);
            }

        return Datatables::of($data)
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
        ->rawColumns(['kategori_udara'])
        ->make(true);
    }
}
