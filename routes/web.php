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
});

Route::get('nilai', 'SensorController@nilai');
Route::get('node1', 'SensorController@node1');
Route::get('node2', 'SensorController@node2');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('beranda', 'BerandaController@index')->name('beranda');
Route::get('data', 'DataController@index')->name('data');

Route::get('kategori-udara', 'KategoriUdaraController@index')->name('kategori-udara');
Route::get('get-kategori-udara', 'KategoriUdaraController@getData')->name('get-kategori-udara');
Route::post('kategori-udara/tambah', 'KategoriUdaraController@tambah')->name('kategori-udara-tambah');
Route::post('kategori-udara/ubah', 'KategoriUdaraController@ubah')->name('kategori-udara-ubah');
Route::get('kategori-udara/hapus', 'KategoriUdaraController@hapus')->name('kategori-udara-hapus');


Route::get('rekomendasi', 'RekomendasiController@index')->name('rekomendasi');

