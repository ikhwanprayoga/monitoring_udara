<?php

use Illuminate\Http\Request;
// use DB;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('tes_sensor', 'SensorController@tes');
Route::get('tes_sensor_arduino/{id}/{suhu}/{kelembapan}/{asap}/{co}/{pm10}', 'SensorController@arduino');

Route::get('kirims/{kode_alat}/{suhu}/{kelembapan}/{asap}/{co}/{pm10}', 'SensorController@kirim');

// Route::get('grafik', 'RealtimeController@grafik');
Route::get('grafik/{id}', 'MonitoringController@grafik')->name('grafik');

// push notifikasi route
Route::get('sendPush', 'firebase\FirebaseController@send');

//api cek online
Route::get('status/', 'MonitoringController@status')->name('status-sensor');

//api kirim data dari arduino
Route::get('kirim_data/{node_sensor_id}/{pm10}/{co}/{asap}/{suhu}/{kelembapan}', 'MonitoringController@monitoring');

//monitoring mobile rata2 nilai sensor per 3 detik yang update hari ini
Route::get('mobile/monitoring', 'mobile\MonitoringController@monitoring')->name('mobile.monitoring');
Route::get('mobile/monitoring/{wilayahId}', 'mobile\MonitoringController@detail')->name('mobile.monitoring.detail');

//tutorial web push
Route::post('/save-subscription/{id}',function($id, Request $request){
  // dd('ha');
  $user = \App\User::find($id);

  $user->updatePushSubscription($request->input('endpoint'), $request->input('keys.p256dh'), $request->input('keys.auth'));
  $user->notify(new \App\Notifications\GenericNotification("Terima kasih telah mengaktifkan webpush notification", "Kamu akan mendapatkan notifikasi ketika udara dalam kondisi tidak sehat."));
  return response()->json([
    'success' => true
  ]);
});

Route::post('/send-notification/{id}', function($id, Request $request){
  $user = \App\User::find($id);
  $user->notify(new \App\Notifications\GenericNotification($request->title, $request->body));
  return response()->json([
    'success' => true
  ]);
});

Route::get('/delete-subscription/{id}', function ($id, Request $request) {
  $del  = DB::table('push_subscriptions')->where('user_id', $id)->delete();
  return response()->json($del, 200);
})->name('delete.subscription');

Route::get('/tes', function () {
  $user = \App\User::find(1);
  $user->notify(new \App\Notifications\GenericNotification("Welcome To WebPush", "You will now get all of our push notifications"));
});