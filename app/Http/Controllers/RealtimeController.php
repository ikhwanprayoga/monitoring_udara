<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RealtimeController extends Controller
{
    public function index()
    {
    	return view('backend.data.realtime');
    }
}
