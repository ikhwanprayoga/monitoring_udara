<?php

namespace App\Http\Controllers\mobile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Monitoring;

class MonitoringController extends Controller
{
    public function monitoring()
    {
        $today = date('Y-m-d');

        $data['pm10']       = Monitoring::where('updated_at', 'LIKE', '%'.$today.'%')->avg('pm10');
        $data['co']         = Monitoring::where('updated_at', 'LIKE', '%'.$today.'%')->avg('co');
        $data['asap']       = Monitoring::where('updated_at', 'LIKE', '%'.$today.'%')->avg('asap');
        $data['suhu']       = Monitoring::where('updated_at', 'LIKE', '%'.$today.'%')->avg('suhu');
        $data['kelembapan'] = Monitoring::where('updated_at', 'LIKE', '%'.$today.'%')->avg('kelembapan');

        return response()->json($data, 200);
    }
}
