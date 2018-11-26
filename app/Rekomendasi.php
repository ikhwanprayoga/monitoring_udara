<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rekomendasi extends Model
{
    protected $table 		= 'rekomendasi';
    protected $guarded 		= ['_token'];
    public $timestamps 		= true;
    protected $primaryKey 	= 'id';

    public function kategori_udara()
    {
    	return $this->belongsTo('App\KategoriUdara', 'kategori_udara_id');
    }
}
