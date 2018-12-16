<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Data;

class BerandaController extends Controller
{
    public function index()
    {
    	$date = date('Y-m-d');
    	$data = Data::where('created_at', 'LIKE', '%' .$date. '%')->get();
    	
    	// return $pm10;
    	// dd($perbulan);
    	return view('backend.beranda.index', compact('data'));
    }
}
