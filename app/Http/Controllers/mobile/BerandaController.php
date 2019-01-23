<?php

namespace App\Http\Controllers\mobile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class BerandaController extends Controller
{
    public function index()
    {
        return view('mobile.beranda.index');
    }
}
