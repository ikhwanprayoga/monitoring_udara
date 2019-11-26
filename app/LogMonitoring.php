<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogMonitoring extends Model
{
    protected $table = 'log_monitoring';
    protected $fillable = [ 
        'node_sensor_id', 'pm10', 'co', 'asap', 'suhu', 'kelembapan'
    ];
    public $timestamps = true;
    protected $primaryKey = 'id';
}
