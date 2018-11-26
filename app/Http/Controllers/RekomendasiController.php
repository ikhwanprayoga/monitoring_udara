<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Rekomendasi;
use App\KategoriUdara;

class RekomendasiController extends Controller
{
    public function index()
    {
    	$data = Rekomendasi::all();
    	$kategori_udara = KategoriUdara::all();

    	return view('backend.rekomendasi.index', compact('data', 'kategori_udara'));
    }

    public function tambah(Request $request)
    {
    	$input = $request->only('kategori_udara_id', 'pesan_rekomendasi');
    	$tambah = Rekomendasi::create($input);

    	return redirect()->back()->with('tambah', true);
    }

    public function ubah(Request $request)
    {
        $input = $request->only('id', 'kategori_udara_id', 'pesan_rekomendasi');
        $ubah = Rekomendasi::find($input['id'])->update($input);

        return redirect()->back()->with('ubah', true);
    }

    public function hapus(Request $request)
    {
        $input = $request->only('id');
        $hapus = Rekomendasi::find($input['id'])->delete();

        return redirect()->back()->with('hapus', true);
    }
}
