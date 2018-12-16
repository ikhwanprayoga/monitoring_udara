<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Monitoring;

class MobileController extends Controller
{
    public function realtime()
    {
        $data['pm10']       = number_format((float)Monitoring::avg('pm10'), 2, ',', '');
        $data['co']         = number_format((float)Monitoring::avg('co'), 2, ',', '');
        $data['asap']       = number_format((float)Monitoring::avg('asap'), 2, ',', '');
        $data['suhu']       = Monitoring::avg('suhu');
        $data['kelembapan'] = Monitoring::avg('kelembapan');

        return response()->json($data, 200);
    }
}
