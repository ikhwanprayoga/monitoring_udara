<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notifikasi extends Model
{
    protected $table = 'notifikasi';
    protected $guarded = ['_token'];
    public $timestamps = true;
    protected $primaryKey = 'id';

    public function nama_kategori()
    {
        return $this->belongsTo('App\KategoriUdara', 'kategori_udara_id');
    }
}