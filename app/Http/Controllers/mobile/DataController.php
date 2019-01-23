<?php

namespace App\Http\Controllers\mobile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
}
