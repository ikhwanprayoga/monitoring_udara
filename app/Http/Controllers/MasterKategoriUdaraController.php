<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MasterKategoriUdaraController extends Controller
{
    public function index()
    {
    	return view('backend.master.kategori_udara');
    }
}
