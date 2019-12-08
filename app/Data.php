<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    protected $table = 'data';
    protected $guarded = ['_token'];
    public $timestamps = true;
    protected $primaryKey = 'id';

    public function nodeSensor()
    {
        return $this->belongsTo('App\NodeSensor', 'node_sensor_id');
    }

}
