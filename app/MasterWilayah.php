<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterWilayah extends Model
{
    protected $table 		= 'master_wilayah';
    protected $guarded 		= ['_token'];
    public $timestamps 		= true;
    protected $primaryKey 	= 'id';
}
