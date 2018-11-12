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

Route::get('/beranda', 'BerandaController@index')->name('beranda');
Route::get('/data', 'DataController@index')->name('data');

Route::group(['prefix' => 'master'], function() {
	Route::get('kategori-udara', 'MasterKategoriUdaraController@index')->name('master-kategori-udara');
});
