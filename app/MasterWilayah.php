<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterWilayah extends Model
{
    protected $table 		= 'master_wilayah';
    protected $guarded 		= ['_token'];
    public $timestamps 		= true;
    protected $primaryKey 	= 'id';

    public function nodeSensors()
    {
    	return $this->hasMany('App\NodeSensor', 'wilayah_id');
    }

    public function nodeSensor()
    {
    	return $this->hasOne('App\NodeSensor', 'wilayah_id');
    }
}
