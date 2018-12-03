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

    public function sementara()
    {
    	$jam_sekarang = date('Y-m-d H');
    	$jam_lama = DataSementara::select('created_at')
    					->orderBy('id', 'desc')
    					->first()
    					->created_at->format('Y-m-d H');
    	$jam_data = DataSementara::select('created_at')
    					->orderBy('id', 'desc')
    					->first()
    					->created_at->format('Y-m-d H:i:s');

    	$menit_sekarang = date('Y-m-d H:i');
    	$menit_lama = DataSementara::select('created_at')
    	                ->orderBy('id', 'desc')
    	                ->first()
    	                ->created_at->format('Y-m-d H:i');

    	if ($menit_sekarang > $menit_lama) {
    		// return 'permenit';
    		$input['pm10'] = DataSementara::where('created_at', '<', $menit_sekarang)->avg('pm10');
    		$input['co'] = DataSementara::where('created_at', '<', $menit_sekarang)->avg('co');
    		$input['asap'] = DataSementara::where('created_at', '<', $menit_sekarang)->avg('asap');
    		$input['suhu'] = DataSementara::where('created_at', '<', $menit_sekarang)->avg('suhu');
    		$input['kelembapan'] = DataSementara::where('created_at', '<', $menit_sekarang)->avg('kelembapan');
    		$input['created_at'] = $jam_data;

    		$kirim_data = DataPermenit::create($input);

    		$data_lama = DataSementara::where('created_at', '<', $menit_sekarang)->select('id')->get();
    			
    		foreach ($data_lama as $key => $value) {
    			$data = $value->id;

    			$hapus_data_lama = DataSementara::where('id', $data)->delete();
    		}
    		return 'berhasil permenit';
    		
    	}
    	if ($jam_sekarang > $jam_lama) {

    		$input['pm10'] = DataPermenit::where('created_at', '<', $jam_sekarang)->avg('pm10');
    		$input['co'] = DataPermenit::where('created_at', '<', $jam_sekarang)->avg('co');
    		$input['asap'] = DataPermenit::where('created_at', '<', $jam_sekarang)->avg('asap');
    		$input['suhu'] = DataPermenit::where('created_at', '<', $jam_sekarang)->avg('suhu');
    		$input['kelembapan'] = DataPermenit::where('created_at', '<', $jam_sekarang)->avg('kelembapan');

    		$jam_data = DataPermenit::select('created_at')
    		                ->orderBy('id', 'desc')
    		                ->first()
    		                ->created_at->format('Y-m-d H:i:s');

    		$input['created_at'] = $jam_data;
    		
    		if (($input['pm10'] >= 0 && $input['pm10'] <= 50) || ($input['co'] >= 0 && $input['co'] <= 50)) {
    		    $input['kategori_udara_id'] = 1;
    		}
    		if (($input['pm10'] >= 51 && $input['pm10'] <= 100) || ($input['co'] >= 51 && $input['co'] <= 100)) {
    		    $input['kategori_udara_id'] = 2;
    		}
    		if (($input['pm10'] >= 101 && $input['pm10'] <= 199) || ($input['co'] >= 101 && $input['co'] <= 199)) {
    		    $input['kategori_udara_id'] = 3;
    		}
    		if (($input['pm10'] >= 200 && $input['pm10'] <= 299) || ($input['co'] >= 200 && $input['co'] <= 299)) {
    		    $input['kategori_udara_id'] = 4;
    		}
    		if ($input['pm10'] >= 300  || $input['co'] >= 300 ) {
    		    $input['kategori_udara_id'] = 5;
    		}

    		$kirim_data = Data::create($input);

    		$data_lama = DataPermenit::where('created_at', '<', $jam_sekarang)->select('id')->get();
    		    
    		foreach ($data_lama as $key => $value) {
    		    $data = $value->id;

    		    $hapus_data_lama = DataPermenit::where('id', $data)->delete();
    		} 

    		return 'perjam berhasil';
    	}

    	return 'maseh transfer data';

    	return view('backend.data.data', compact('data'));
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
