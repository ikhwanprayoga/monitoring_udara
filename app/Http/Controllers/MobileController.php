<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Monitoring;

class MobileController extends Controller
{
    public function realtime()
    {
        $data = Monitoring::all();

        return response()->json($data, 200);
    }
}
