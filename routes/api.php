<?php

use Illuminate\Http\Request;

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

Route::get('kirim_data/{kode_alat}/{pm10}/{co}/{asap}/{suhu}/{kelembapan}', 'MonitoringController@monitoring');

Route::get('grafik', 'RealtimeController@grafik');

