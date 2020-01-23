<?php

namespace App\Http\Controllers\mobile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Monitoring;
use App\MasterWilayah;
use App\NodeSensor;

class MonitoringController extends Controller
{
    public function monitoring()
    {
        $date = new \DateTime();
        $date->modify('-1 minutes');
        $waktu = $date->format('Y-m-d H:i:s');
        // return $waktu;
        $wilayahs = MasterWilayah::has('nodeSensors')->with('nodeSensors')->get();
        $monitorings = Monitoring::all();

        foreach ($wilayahs as $keyW => $wilayah) {
            $data[$keyW]['wilayah_id'] = $wilayah->id;

            foreach ($wilayah as $keyN => $nodeSensor) {
                $nodeSensorId = NodeSensor::where('wilayah_id', $wilayah->id)->pluck('id');
            }

            foreach ($monitorings as $keyM => $monitoring) {
                $data[$keyW]['pm10'] = Monitoring::whereIn('node_sensor_id', $nodeSensorId)->where('updated_at', '>', $waktu)->avg('pm10');
                $data[$keyW]['co'] = Monitoring::whereIn('node_sensor_id', $nodeSensorId)->where('updated_at', '>', $waktu)->avg('co');
                $data[$keyW]['asap'] = Monitoring::whereIn('node_sensor_id', $nodeSensorId)->where('updated_at', '>', $waktu)->avg('asap');
                $data[$keyW]['suhu'] = Monitoring::whereIn('node_sensor_id', $nodeSensorId)->where('updated_at', '>', $waktu)->avg('suhu');
                $data[$keyW]['kelembapan'] = Monitoring::whereIn('node_sensor_id', $nodeSensorId)->where('updated_at', '>', $waktu)->avg('kelembapan');
                $data[$keyW]['waktuDataBase'] = $waktu;
            }
            
        }
        
        return response()->json($data, 200);
    }

    public function detail($wilayahId)
    {
        $date = new \DateTime();
        $date->modify('-1 minutes');
        $waktu = $date->format('Y-m-d H:i:s');
        $wilayah = MasterWilayah::where('id', $wilayahId)->has('nodeSensors')->with('nodeSensors')->first();
        $monitorings = Monitoring::all();

        // foreach ($wilayahs as $keyW => $wilayah) {
            // $data[$keyW]['wilayah_id'] = $wilayah->id;

            foreach ($wilayah->nodeSensors as $keyN => $nodeSensor) {
                $nodeSensorId[] = NodeSensor::where('id', $nodeSensor->id)->first()->id;
            }
            // return $nodeSensorId;
            // foreach ($monitorings as $keyM => $monitoring) {
                $data['pm10'] = Monitoring::whereIn('node_sensor_id', $nodeSensorId)->where('updated_at', '>', $waktu)->avg('pm10');
                $data['co'] = Monitoring::whereIn('node_sensor_id', $nodeSensorId)->where('updated_at', '>', $waktu)->avg('co');
                $data['asap'] = Monitoring::whereIn('node_sensor_id', $nodeSensorId)->where('updated_at', '>', $waktu)->avg('asap');
                $data['suhu'] = Monitoring::whereIn('node_sensor_id', $nodeSensorId)->where('updated_at', '>', $waktu)->avg('suhu');
                $data['kelembapan'] = Monitoring::whereIn('node_sensor_id', $nodeSensorId)->where('updated_at', '>', $waktu)->avg('kelembapan');
                $waktu = Monitoring::orderBy('updated_at', 'desc')->first()->updated_at;
                $data['waktu'] = date('H:i', strtotime($waktu));
            // }
            
        // }
        
        return response()->json($data, 200);
    }

    // public function detail($wilayahId)
    // {
    //     $today = date('Y-m-d H:i');

    //     $data['pm10']       = Monitoring::where('updated_at', 'LIKE', '%'.$today.'%')->avg('pm10');
    //     $data['co']         = Monitoring::where('updated_at', 'LIKE', '%'.$today.'%')->avg('co');
    //     $data['asap']       = Monitoring::where('updated_at', 'LIKE', '%'.$today.'%')->avg('asap');
    //     $data['suhu']       = Monitoring::where('updated_at', 'LIKE', '%'.$today.'%')->avg('suhu');
    //     $data['kelembapan'] = Monitoring::where('updated_at', 'LIKE', '%'.$today.'%')->avg('kelembapan');
    //     $waktu              = Monitoring::where('updated_at', 'LIKE', '%'.$today.'%')->orderBy('updated_at', 'desc')->first()->updated_at;
    //     $data['waktu']      = date('H:i:s', strtotime($waktu));

    //     return response()->json($data, 200);
    // }
}