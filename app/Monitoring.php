<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Monitoring extends Model
{
    protected $table = 'monitoring';
    protected $guarded = ['_token'];
    public $timestamps = true;
    protected $primaryKey = 'id';

    public function nodeSensor()
    {
    	return $this->belongsTo('App\NodeSensor');
    }
}
