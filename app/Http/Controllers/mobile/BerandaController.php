<?php

namespace App\Http\Controllers\mobile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Rekomendasi;
use App\Notifikasi;
use App\MasterWilayah;

class BerandaController extends Controller
{
    public function index()
    {
        $wilayahs = MasterWilayah::has('nodeSensors')->get();
        // return $wilayah;
        $data = Rekomendasi::orderBy('kategori_udara_id', 'ASC')->get();
        $aktif = 0;
        return view('mobile.beranda.index', compact('wilayahs', 'aktif', 'data'));
    }

    public function detail($wilayahId)
    {
        $wilayah = MasterWilayah::where('id', $wilayahId)->first();
        return view('mobile.beranda.detail', compact('wilayah'));
    }

    public function rekomendasi()
    {
        $data = Rekomendasi::orderBy('kategori_udara_id', 'ASC')->get();
        $aktif = Notifikasi::orderBy('id', 'DESC')->first()->kategori_udara_id;
        
        return view('mobile.beranda.index', compact('data', 'aktif'));
    }
}
