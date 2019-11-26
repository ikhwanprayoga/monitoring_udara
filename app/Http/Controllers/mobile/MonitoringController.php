<?php

namespace App\Http\Controllers\mobile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Monitoring;

class MonitoringController extends Controller
{
    public function monitoring()
    {
        $today = date('Y-m-d H:i');

        $data['pm10']       = Monitoring::where('updated_at', 'LIKE', '%'.$today.'%')->avg('pm10');
        $data['co']         = Monitoring::where('updated_at', 'LIKE', '%'.$today.'%')->avg('co');
        $data['asap']       = Monitoring::where('updated_at', 'LIKE', '%'.$today.'%')->avg('asap');
        $data['suhu']       = Monitoring::where('updated_at', 'LIKE', '%'.$today.'%')->avg('suhu');
        $data['kelembapan'] = Monitoring::where('updated_at', 'LIKE', '%'.$today.'%')->avg('kelembapan');
        $waktu              = Monitoring::where('updated_at', 'LIKE', '%'.$today.'%')->orderBy('updated_at', 'desc')->first()->updated_at;
        $data['waktu']      = date('H:i:s', strtotime($waktu));

        return response()->json($data, 200);
    }
}
