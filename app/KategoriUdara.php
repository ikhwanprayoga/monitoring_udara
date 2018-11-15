<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KategoriUdara extends Model
{
    protected $table 		= 'kategori_udara';
    protected $guarded 		= ['_token'];
    public $timestamps 		= true;
    protected $primaryKey 	= 'id';
}
