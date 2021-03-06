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
        $data = NodeSensor::orderBy('id', 'asc')->with('nama_wilayah')->get();
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

        $node_sensor = Monitoring::where('node_sensor_id', $node_sensor_id)->first();
        //jika node sensor blm ada maka di buat
    	if (empty($node_sensor)) {
    		$simpan = Monitoring::create($input);
    		// return "data baru";
    	}

        //jika node sensor sudah ada maka di update
    	if (isset($node_sensor)) {
    		$update = Monitoring::find($node_sensor->id)->update($input);
    		// return "data di update";
    	}

        //simpan data ke data sementara
        $simpanDataSementara = DataSementara::create(
            [
                'node_sensor_id' => $request->node_sensor_id,
                'pm10'           => $request->pm10,
                'co'             => $request->co,
                'asap'           => $request->asap,
                'suhu'           => $request->suhu,
                'kelembapan'     => $request->kelembapan,
            ]
        );
        
        //cek data permenit
        $dataPermenit1 = DataPermenit::where('node_sensor_id', $node_sensor_id)->first();
        //jika kosong maka buat data
        if (empty($dataPermenit1)) {
            // return 'data permenit kosong';
            $inputDataPermenit['node_sensor_id'] = $node_sensor_id;
            $inputDataPermenit['pm10']           = DataSementara::where('node_sensor_id', $node_sensor_id)->avg('pm10');
            $inputDataPermenit['co']             = DataSementara::where('node_sensor_id', $node_sensor_id)->avg('co');
            $inputDataPermenit['asap']           = DataSementara::where('node_sensor_id', $node_sensor_id)->avg('asap');
            $inputDataPermenit['suhu']           = DataSementara::where('node_sensor_id', $node_sensor_id)->avg('suhu');
            $inputDataPermenit['kelembapan']     = DataSementara::where('node_sensor_id', $node_sensor_id)->avg('kelembapan');

            $tambahDataPermenit = DataPermenit::create($inputDataPermenit);
        }
        
        $dataPermenit2 = DataPermenit::where('node_sensor_id', $node_sensor_id)->orderBy('id', 'desc')->first();

        if ( isset($dataPermenit2) ) {
            // return 'data menit tersedia';
            $menit_lama = $dataPermenit2->created_at->format('Y-m-d H:i');
            $menit_sekarang = Monitoring::where('node_sensor_id', $node_sensor_id)->first()->updated_at->format('Y-m-d H:i');
            
            if ($menit_sekarang > $menit_lama) {
                
                $inputMenit['node_sensor_id'] = $node_sensor_id;
                $inputMenit['pm10']           = DataSementara::where('node_sensor_id', $node_sensor_id)->where('created_at', '<', $menit_sekarang)->avg('pm10');
                $inputMenit['co']             = DataSementara::where('node_sensor_id', $node_sensor_id)->where('created_at', '<', $menit_sekarang)->avg('co');
                $inputMenit['asap']           = DataSementara::where('node_sensor_id', $node_sensor_id)->where('created_at', '<', $menit_sekarang)->avg('asap');
                $inputMenit['suhu']           = DataSementara::where('node_sensor_id', $node_sensor_id)->where('created_at', '<', $menit_sekarang)->avg('suhu');
                $inputMenit['kelembapan']     = DataSementara::where('node_sensor_id', $node_sensor_id)->where('created_at', '<', $menit_sekarang)->avg('kelembapan');

                // $menit_data = DataSementara::where('node_sensor_id', $node_sensor_id)
                //                 ->orderBy('id', 'desc')
                //                 ->first()
                //                 ->created_at->format('Y-m-d H:i:s');

                // $inputMenit['created_at'] = $menit_data;
                
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
                
                $data_lama = DataSementara::where('node_sensor_id', $node_sensor_id)->select('id')->get();
                    
                foreach ($data_lama as $key => $value) {
                    $hapus_data_lama = DataSementara::where('id', $value->id)->delete();
                }
                // return 'berhasil permenit';
            }
            
            $dataPerjam1 = Data::where('node_sensor_id', $node_sensor_id)->first();

            if (empty($dataPerjam1)) {
                // return "jam kosong";
                $inputDataPerjam['node_sensor_id']  = $node_sensor_id;
                $inputDataPerjam['pm10']            = DataPermenit::where('node_sensor_id', $node_sensor_id)->avg('pm10');
                $inputDataPerjam['co']              = DataPermenit::where('node_sensor_id', $node_sensor_id)->avg('co');
                $inputDataPerjam['asap']            = DataPermenit::where('node_sensor_id', $node_sensor_id)->avg('asap');
                $inputDataPerjam['suhu']            = DataPermenit::where('node_sensor_id', $node_sensor_id)->avg('suhu');
                $inputDataPerjam['kelembapan']      = DataPermenit::where('node_sensor_id', $node_sensor_id)->avg('kelembapan');

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
                $jam_lama = Data::where('node_sensor_id', $node_sensor_id)
                                ->orderBy('id', 'desc')
                                ->first()
                                ->created_at->format('Y-m-d H');
                $monitoring = Monitoring::where('node_sensor_id', $node_sensor_id)
                                ->orderBy('id', 'desc')
                                ->first();
                
                $jam_sekarang = $monitoring->updated_at->format('Y-m-d H');
                // $created_at_sekarang = $monitoring->updated_at;
                
                if ($jam_sekarang > $jam_lama) {
                    
                    $inputJam['node_sensor_id']  = $node_sensor_id;
                    $inputJam['pm10']            = DataPermenit::where('node_sensor_id', $node_sensor_id)->avg('pm10');
                    $inputJam['co']              = DataPermenit::where('node_sensor_id', $node_sensor_id)->avg('co');
                    $inputJam['asap']            = DataPermenit::where('node_sensor_id', $node_sensor_id)->avg('asap');
                    $inputJam['suhu']            = DataPermenit::where('node_sensor_id', $node_sensor_id)->avg('suhu');
                    $inputJam['kelembapan']      = DataPermenit::where('node_sensor_id', $node_sensor_id)->avg('kelembapan');
                    
                    $waktu = DataPermenit::where('node_sensor_id', $node_sensor_id)->orderBy('id', 'desc')->first()->created_at;
                    
                    $inputJam['waktu'] = (int)date('H', strtotime($waktu))-1;

                    if ($inputJam['waktu'] < 0) {
                        // return '0';
                        $inputJam['waktu'] = 23;
                        // $inputJam['created_at'] = Data::where('node_sensor_id', $node_sensor_id)->orderBy('id', 'desc')->first()->created_at;
                        $tanggal = Data::where('node_sensor_id', $node_sensor_id)->orderBy('id', 'desc')->first()->created_at;
                        $inputJam['tanggal'] = date('Y-m-d', strtotime($tanggal));
                    } else {
                        // return 'er';
                        $inputJam['tanggal'] = date('Y-m-d', strtotime($waktu));
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
                    // return $inputJam;
                    $kirim_data = Data::create($inputJam);

                    //kirim notif berdasarkan kategori udara id
                    if ($inputJam['kategori_udara_id'] == 3 || $inputJam['kategori_udara_id'] == 4 || $inputJam['kategori_udara_id'] == 5) {
                        $this->kirim_notif($inputJam['kategori_udara_id']);
                    }

                    $data_lama = DataPermenit::where('node_sensor_id', $node_sensor_id)->get();
                        
                    foreach ($data_lama as $key => $value) {
                        $hapus_data_lama = DataPermenit::where('id', $value->id)->delete();
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
