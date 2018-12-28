<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Monitoring;
use App\Data;

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

    public function chart()
    {
        $date = date('Y-m-d');
        $data = Data::where('created_at', 'LIKE', '%' .$date. '%', '')->get();

        // for ($i = 0; $i < 24; $i++) {
        //     $key = date('H:i', strtotime(date('Y-m-d') . ' + ' . $i . ' hours'));
        //     $value = date('h:i A', strtotime(date('Y-m-d') . ' + ' . $i . ' hours'));
        //     $formatter[$key] = $value;

        // }

        // return $formatter;

        return response()->json($data, 200);
    }

}
