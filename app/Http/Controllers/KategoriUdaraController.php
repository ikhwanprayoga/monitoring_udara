<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KategoriUdara;
use Yajra\Datatables\Datatables;

class KategoriUdaraController extends Controller
{
    public function index()
    {
    	return view('backend.master.kategori_udara');
    }

    public function getData()
    {
    	$data = KategoriUdara::select(['id','nama_kategori_udara','pm10_min','pm10_max','co_min','co_max']);

    	return Datatables::of($data)
    		->addColumn('action', function ($data) {
    			return '<a data-toggle="modal" href="#modal_edit" class="btn btn-sm btn-warning"
    						data-id="'.$data->id.'"
    						data-nama_kategori_udara="'.$data->nama_kategori_udara.'"
    						data-pm10_min="'.$data->pm10_min.'"
    						data-pm10_max="'.$data->pm10_max.'"
    						data-co_min="'.$data->co_min.'"
    						data-co_max="'.$data->co_max.'"
    					><i class="ft ft-edit"></i>Ubah</a>
    					<a data-toggle="modal" href="#modal_hapus" 
    						data-id="'.$data->id.'" 
    						data-nama_kategori_udara="'.$data->nama_kategori_udara.'" 
    					data-toggle="modal" class="btn btn-sm btn-danger"><i class="ft ft-trash"></i>Hapus</a>';
    		})
    		->make(true);
    }

    public function tambah(Request $request)
    {
    	$input = $request->all();
    	$tambah = KategoriUdara::create($input);

    	return redirect()->back()->with('tambah', true);
    }

    public function ubah(Request $request)
    {
    	$data = $request->only('id','nama_kategori_udara','pm10_min','pm10_max','co_min','co_max');
    	$ubah = KategoriUdara::where('id', $data['id'])->update($data);

    	return redirect()->back()->with('ubah', true);;
    }

    public function hapus(Request $request)
    {
    	$id = $request->id;
    	$hapus = KategoriUdara::where('id', $id)->delete();

    	return redirect()->back()->with('hapus', true);;
    }
}
