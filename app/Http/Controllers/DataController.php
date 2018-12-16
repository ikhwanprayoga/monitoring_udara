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
    	$data = Data::join('kategori_udara', 'data.kategori_udara_id', '=', 'kategori_udara.id')
                    ->select(['data.id','data.pm10','data.co','data.asap','data.suhu','data.kelembapan','data.created_at','kategori_udara.nama_kategori_udara']);

            if ($request->has('mulai') && $request->has('akhir') && $request->mulai != null && $request->akhir != null) {
                $data->whereBetween('created_at', [$request->mulai, $request->akhir]);
            }

            if ($request->has('kategori_udara') && $request->kategori_udara != null) {
                $data->where('kategori_udara_id', $request->kategori_udara);
            }

    	return Datatables::of($data)->make(true);
    }
}
