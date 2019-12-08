<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NodeSensor extends Model
{
    protected $table = 'node_sensor';
    protected $guarded = ['_token'];
    public $timestamps = true;
    protected $primaryKey = 'id';

    public function nama_wilayah()
    {
    	return $this->belongsTo('App\MasterWilayah', 'wilayah_id');
    }

    public function data()
    {
    	return $this->hasMany('App\Data', 'node_sensor_id');
    }
}
