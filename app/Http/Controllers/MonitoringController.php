<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;

use App\Monitoring;
use App\LogMonitoring;
use App\NodeSensor;
use App\DataSementara;
use App\DataPermenit;
use App\Data;


class MonitoringController extends Controller
{
	public function index()
	{
        $data = NodeSensor::orderBy('id', 'asc')->get();
		return view('backend.monitoring.index', compact('data'));
	}

    public function monitoring_node($id)
    {
        $sensor = NodeSensor::where('id', $id)->first();
        return view('backend.monitoring.node', compact('sensor'));
    }

    public function monitoring(Request $request, $node_sensor_id, $pm10, $co, $asap, $suhu, $kelembapan)
    {
        $input['node_sensor_id']   = $request->node_sensor_id;
    	$input['pm10'] 		       = $request->pm10;
    	$input['co'] 		       = $request->co;
    	$input['asap'] 		       = $request->asap;
    	$input['suhu'] 		       = $request->suhu;
    	$input['kelembapan']       = $request->kelembapan;


        $node_sensor_id = Monitoring::where('node_sensor_id', $input['node_sensor_id'])->first();
        
        //log monitoring
        $log_monitoring = LogMonitoring::create(
            [
                'node_sensor_id' => $request->node_sensor_id,
                'pm10'           => $request->pm10,
                'co'             => $request->co,
                'asap'           => $request->asap,
                'suhu'           => $request->suhu,
                'kelembapan'     => $request->kelembapan,
            ]
        );

        //jika node sensor blm ada maka di buat
    	if (empty($node_sensor_id)) {
    		$simpan = Monitoring::create($input);
    		// return "data baru";
    		// return redirect()->back();
    	}

        //jika node sensor sudah ada maka di update
    	if (isset($node_sensor_id)) {
	    	$id 		        = $node_sensor_id->id;
    		$update = Monitoring::find($id)->update($input);
    		// return "data di update";
    		// return redirect()->back();
    	}

        //kirim data ke data sementara
        $data = Monitoring::all(); //dikoreksilagi
        foreach ($data as $key => $value) {
            DataSementara::create([
                'node_sensor_id' => $value->node_sensor_id,
                'pm10'           => $value->pm10,
                'co'             => $value->co,
                'asap'           => $value->asap,
                'suhu'           => $value->suhu,
                'kelembapan'     => $value->kelembapan,
            ]);
        }
        //cek data permenit
        $dataPermenit1 = DataPermenit::first();
        //jika kosong maka buat data
        if (empty($dataPermenit1)) {
            // return 'data permenit kosong';
            $inputDataPermenit['pm10']          = DataSementara::avg('pm10');
            $inputDataPermenit['co']            = DataSementara::avg('co');
            $inputDataPermenit['asap']          = DataSementara::avg('asap');
            $inputDataPermenit['suhu']          = DataSementara::avg('suhu');
            $inputDataPermenit['kelembapan']    = DataSementara::avg('kelembapan');

            $tambahDataPermenit = DataPermenit::create($inputDataPermenit);
        }

        $dataPermenit2 = DataPermenit::orderBy('id', 'desc')->first();

        if ( isset($dataPermenit2) ) {
            // return 'data menit tersedia';
            $menit_lama = $dataPermenit2->created_at->format('Y-m-d H:i');
            $menit_sekarang = DataSementara::orderBy('id', 'desc')->first()->created_at->format('Y-m-d H:i');

            if ($menit_sekarang > $menit_lama) {
                // return 'permenit';
                $inputMenit['pm10']     = DataSementara::where('created_at', '<', $menit_sekarang)->avg('pm10');
                $inputMenit['co']       = DataSementara::where('created_at', '<', $menit_sekarang)->avg('co');
                $inputMenit['asap']     = DataSementara::where('created_at', '<', $menit_sekarang)->avg('asap');
                $inputMenit['suhu']     = DataSementara::where('created_at', '<', $menit_sekarang)->avg('suhu');
                $inputMenit['kelembapan'] = DataSementara::where('created_at', '<', $menit_sekarang)->avg('kelembapan');

                $menit_data = DataSementara::select('created_at')
                                ->orderBy('id', 'desc')
                                ->first()
                                ->created_at->format('Y-m-d H:i:s');

                $inputMenit['created_at'] = $menit_data;

                //notif permenit
                // if (($inputMenit['pm10'] >= 0 && $inputMenit['pm10'] <= 50) || ($inputMenit['co'] >= 0 && $inputMenit['co'] <= 50)) {
                //     $kualitas_udara_sementara = 1;
                // }
                // if (($inputMenit['pm10'] >= 51 && $inputMenit['pm10'] <= 100) || ($inputMenit['co'] >= 51 && $inputMenit['co'] <= 100)) {
                //     $kualitas_udara_sementara = 2;
                // }
                // if (($inputMenit['pm10'] >= 101 && $inputMenit['pm10'] <= 199) || ($inputMenit['co'] >= 101 && $inputMenit['co'] <= 199)) {
                //     $kualitas_udara_sementara = 3;
                // }
                // if (($inputMenit['pm10'] >= 200 && $inputMenit['pm10'] <= 299) || ($inputMenit['co'] >= 200 && $inputMenit['co'] <= 299)) {
                //     $kualitas_udara_sementara = 4;
                // }
                // if ($inputMenit['pm10'] >= 300  || $inputMenit['co'] >= 300 ) {
                //     $kualitas_udara_sementara = 5;
                // }
                // //kirim notif berdasarkan kategori udara id
                // if ($kualitas_udara_sementara == 3 || $kualitas_udara_sementara == 4 || $kualitas_udara_sementara == 5) {
                //     $this->kirim_notif($kualitas_udara_sementara);
                // }
                //tutup notif permenit

                $kirim_data = DataPermenit::create($inputMenit);

                $data_lama = DataSementara::where('created_at', '<', $menit_sekarang)->select('id')->get();
                    
                foreach ($data_lama as $key => $value) {
                    $data = $value->id;

                    $hapus_data_lama = DataSementara::where('id', $data)->delete();
                }
                // return 'berhasil permenit';
            }

            $dataPerjam1 = Data::first();

            if (empty($dataPerjam1)) {
                // return "jam kosong";
                $inputDataPerjam['pm10']    = DataPermenit::avg('pm10');
                $inputDataPerjam['co']      = DataPermenit::avg('co');
                $inputDataPerjam['asap']    = DataPermenit::avg('asap');
                $inputDataPerjam['suhu']    = DataPermenit::avg('suhu');
                $inputDataPerjam['kelembapan'] = DataPermenit::avg('kelembapan');

                if (($inputDataPerjam['pm10'] >= 0 && $inputDataPerjam['pm10'] <= 50) || ($inputDataPerjam['co'] >= 0 && $inputDataPerjam['co'] <= 50)) {
                    $inputDataPerjam['kategori_udara_id'] = 1;
                }
                if (($inputDataPerjam['pm10'] >= 51 && $inputDataPerjam['pm10'] <= 100) || ($inputDataPerjam['co'] >= 51 && $inputDataPerjam['co'] <= 100)) {
                    $inputDataPerjam['kategori_udara_id'] = 2;
                }
                if (($inputDataPerjam['pm10'] >= 101 && $inputDataPerjam['pm10'] <= 199) || ($inputDataPerjam['co'] >= 101 && $inputDataPerjam['co'] <= 199)) {
                    $inputDataPerjam['kategori_udara_id'] = 3;
                }
                if (($inputDataPerjam['pm10'] >= 200 && $inputDataPerjam['pm10'] <= 299) || ($inputDataPerjam['co'] >= 200 && $inputDataPerjam['co'] <= 299)) {
                    $inputDataPerjam['kategori_udara_id'] = 4;
                }
                if ($inputDataPerjam['pm10'] >= 300  || $inputDataPerjam['co'] >= 300 ) {
                    $inputDataPerjam['kategori_udara_id'] = 5;
                }

                $tambahDataPermenit = Data::create($inputDataPerjam);
                // return 'berhasil nambakan jam';
            }

            if (isset($dataPerjam1)) {
                // return 'data jam ada';
                $jam_lama = Data::orderBy('id', 'desc')
                                ->first()
                                ->created_at->format('Y-m-d H');
                $jam_sekarang = DataPermenit::orderBy('id', 'desc')
                                ->first()
                                ->created_at->format('Y-m-d H');

                if ($jam_sekarang > $jam_lama) {

                    $inputJam['pm10']       = DataPermenit::where('created_at', '<', $jam_sekarang)->avg('pm10');
                    $inputJam['co']         = DataPermenit::where('created_at', '<', $jam_sekarang)->avg('co');
                    $inputJam['asap']       = DataPermenit::where('created_at', '<', $jam_sekarang)->avg('asap');
                    $inputJam['suhu']       = DataPermenit::where('created_at', '<', $jam_sekarang)->avg('suhu');
                    $inputJam['kelembapan'] = DataPermenit::where('created_at', '<', $jam_sekarang)->avg('kelembapan');

                    $waktu = DataPermenit::where('created_at', '<', $jam_sekarang)->orderBy('id', 'desc')->first()->created_at;
                    
                    $inputJam['waktu'] = (int)date('H', strtotime($waktu));

                    if ($inputJam['waktu'] == 23) {
                        $inputJam['created_at'] = Data::orderBy('id', 'desc')->first()->created_at;
                    } else {
                        $inputJam['created_at'] = $waktu;
                    }

                    if (($inputJam['pm10'] >= 0 && $inputJam['pm10'] <= 50) || ($inputJam['co'] >= 0 && $inputJam['co'] <= 50)) {
                        $inputJam['kategori_udara_id'] = 1;
                    }
                    if (($inputJam['pm10'] >= 51 && $inputJam['pm10'] <= 100) || ($inputJam['co'] >= 51 && $inputJam['co'] <= 100)) {
                        $inputJam['kategori_udara_id'] = 2;
                    }
                    if (($inputJam['pm10'] >= 101 && $inputJam['pm10'] <= 199) || ($inputJam['co'] >= 101 && $inputJam['co'] <= 199)) {
                        $inputJam['kategori_udara_id'] = 3;
                    }
                    if (($inputJam['pm10'] >= 200 && $inputJam['pm10'] <= 299) || ($inputJam['co'] >= 200 && $inputJam['co'] <= 299)) {
                        $inputJam['kategori_udara_id'] = 4;
                    }
                    if ($inputJam['pm10'] >= 300  || $inputJam['co'] >= 300 ) {
                        $inputJam['kategori_udara_id'] = 5;
                    }

                    $kirim_data = Data::create($inputJam);

                    //kirim notif berdasarkan kategori udara id
                    if ($inputJam['kategori_udara_id'] == 3 || $inputJam['kategori_udara_id'] == 4 || $inputJam['kategori_udara_id'] == 5) {
                        $this->kirim_notif($inputJam['kategori_udara_id']);
                    }

                    $data_lama = DataPermenit::where('created_at', '<', $jam_sekarang)->select('id')->get();
                        
                    foreach ($data_lama as $key => $value) {
                        $data = $value->id;

                        $hapus_data_lama = DataPermenit::where('id', $data)->delete();
                    } 

                    // return 'perjam berhasil';
                }

            }

        }

        // return 'yas';

    	// $this->store_data_sementara(); //strore ke data sementara
        
    }

    public function status()
    {
        $datas = Monitoring::all();
        $waktuSekarang = (int)date('YmdHis');

        foreach ($datas as $key => $value) {

            $updated_at = (int)date('YmdHis', strtotime($value->updated_at));

            if (($waktuSekarang - $updated_at) <= 10) {
                $status = 1;
            } else {
                $status = 0;
            }
            
            $data[$key]['id_sensor'] = $value->node_sensor_id;
            $data[$key]['status'] = $status;
            
        }

        return response()->json($data);
    }

    public function grafik($id)
    {
    	$data = Monitoring::where('node_sensor_id', $id)->first();
    	return response()->json($data);
    }

    public function kirim_notif($kategori_udara)
    {
        $notif = app(NotifikasiController::class);
        return $notif->send($kategori_udara);
    }
}
