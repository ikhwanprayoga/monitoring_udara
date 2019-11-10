<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\Rekomendasi;
use App\KategoriUdara;
use App\Notifikasi;

class NotifikasiController extends Controller
{
    public function index()
    {
        $data = Notifikasi::paginate(10);
        return view('backend.notifikasi.index', compact('data'));
    }

    public function send($kategori_udara_id)
    {
        $pesan = Rekomendasi::where('kategori_udara_id', $kategori_udara_id)->first()->pesan_rekomendasi;
        $kualitas_udara = KategoriUdara::where('id', $kategori_udara_id)->first()->nama_kategori_udara;

        $subscriber = DB::table('push_subscriptions')->get();

        foreach ($subscriber as $key => $value) {
            $user = \App\User::find($value->user_id);
            $user->notify(new \App\Notifications\GenericNotification('Peringatan! Kualitas Udara '.$kualitas_udara, strip_tags($pesan)));
            $res = $key+1;
        }
        
        if ($res >= 1) {
            $input['kategori_udara_id'] = $kategori_udara_id;
            $input['title'] = 'Peringatan! Kualitas Udara'.$kualitas_udara;
            $input['body'] = $pesan;

            $notif = Notifikasi::create($input);
        }

        return response()->json([
            'success' => true
        ]);
    }

    public function hapus(Request $request)
    {
        $data = Notifikasi::find($request->id)->delete();

        return redirect()->back()->with('hapus', true);
    }

    public function tes($kategori_kualitas_udara)
    {
        return $this->send($kategori_kualitas_udara);
        $kk = app(MonitoringController::class);
        return $kk->cobe('tulah');
    }
}
