<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('base');

Route::get('nilai', 'SensorController@nilai');
Route::get('node1', 'SensorController@node1');
Route::get('node2', 'SensorController@node2');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function() {
    
    Route::get('beranda', 'BerandaController@index')->name('beranda');

    Route::group(['prefix' => 'monitoring'], function() {
        Route::get('/', 'MonitoringController@index')->name('monitoring');
        Route::get('/node/{id}', 'MonitoringController@monitoring_node')->name('monitoring_node');
    });

    Route::get('data', 'DataController@index')->name('data');
    Route::get('get-data', 'DataController@getData')->name('get-data');

    Route::get('data-realtime', 'RealtimeController@index')->name('realtime');
    Route::get('getData-realtime', 'RealtimeController@getData')->name('getData-realtime');

    Route::get('rekomendasi', 'RekomendasiController@index')->name('rekomendasi');
    Route::post('rekomendasi/tambah', 'RekomendasiController@tambah')->name('rekomendasi-tambah');
    Route::post('rekomendasi/ubah', 'RekomendasiController@ubah')->name('rekomendasi-ubah');
    Route::get('rekomendasi/hapus', 'RekomendasiController@hapus')->name('rekomendasi-hapus');

    Route::group(['prefix' => 'master'], function() {

        Route::get('kategori-udara', 'KategoriUdaraController@index')->name('kategori-udara');
        Route::get('get-kategori-udara', 'KategoriUdaraController@getData')->name('get-kategori-udara');
        Route::post('kategori-udara/tambah', 'KategoriUdaraController@tambah')->name('kategori-udara-tambah');
        Route::post('kategori-udara/ubah', 'KategoriUdaraController@ubah')->name('kategori-udara-ubah');
        Route::get('kategori-udara/hapus', 'KategoriUdaraController@hapus')->name('kategori-udara-hapus');

        Route::get('node_sensor', 'MasterController@node_sensor_index')->name('node-sensor');
        Route::post('node_sensor/tambah', 'MasterController@node_sensor_tambah')->name('node-sensor-tambah');
        Route::post('node_sensor/ubah', 'MasterController@node_sensor_ubah')->name('node-sensor-ubah');
        Route::get('node_sensor/hapus', 'MasterController@node_sensor_hapus')->name('node-sensor-hapus');

        Route::get('wilayah', 'MasterController@wilayah_index')->name('wilayah');
        Route::post('wilayah/tambah', 'MasterController@wilayah_tambah')->name('wilayah-tambah');
        Route::post('wilayah/ubah/{id}', 'MasterController@wilayah_ubah')->name('wilayah-ubah');
        Route::get('wilayah/hapus/{id}', 'MasterController@wilayah_hapus')->name('wilayah-hapus');

    });

    Route::group(['prefix' => 'operator', 'middleware' => ['role:superadmin']], function () {
        Route::get('/', 'OperatorController@index')->name('operator');
        Route::post('tambah', 'OperatorController@tambah')->name('operator-tambah');
        Route::post('ubah/{id}', 'OperatorController@ubah')->name('operator-ubah');
        Route::post('hapus/{id}', 'OperatorController@hapus')->name('operator-hapus');
    });


});

//route mobile
Route::group(['prefix' => 'mobile', 'namespace' => 'mobile', 'middleware' => ['auth']], function () {
    Route::get('beranda', 'BerandaController@index')->name('mobile.beranda');
    
    Route::get('data', 'DataController@index')->name('mobile.data');
    Route::get('data/detail', 'DataController@detail')->name('mobile.data.detail');

    // yajra get data
    Route::get('getData/ringkasan', 'DataController@getData_ringkasan')->name('mobile.getData.ringkasan');
    Route::get('getData/detail', 'DataController@getData_detail')->name('mobile.getData.detail');

    Route::get('setting', 'SettingController@index')->name('mobile.setting');
});

// route firebase
Route::get('firebase', 'firebase\FirebaseController@index');
Route::get('firebase/send', 'firebase\FirebaseController@send');
Route::get('firebase/fcm', 'firebase\FirebaseController@fcm');
