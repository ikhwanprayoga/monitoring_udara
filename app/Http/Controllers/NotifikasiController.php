<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\Rekomendasi;
use App\KategoriUdara;

class NotifikasiController extends Controller
{
    public function index()
    {
        return view('backend.notifikasi.index');
    }

    public function send_all($kategori_udara_id)
    {
        $pesan = Rekomendasi::where('kategori_udara_id', $kategori_udara_id)->first()->pesan_rekomendasi;
        $kualitas_udara = KategoriUdara::where('id', $kategori_udara_id)->first()->nama_kategori_udara;

        $subscriber = DB::table('push_subscriptions')->get();

        foreach ($subscriber as $key => $value) {
            $user = \App\User::find($value->user_id);
            $user->notify(new \App\Notifications\GenericNotification('Peringatan! Kualitas Udara '.strip_tags($kualitas_udara), strip_tags($pesan)));
        }

        return response()->json([
            'success' => true
        ]);
    }

    public function tes()
    {
        // return $this->send_all(5);
        $kk = app(MonitoringController::class);
        return $kk->cobe('tulah');
    }
}
