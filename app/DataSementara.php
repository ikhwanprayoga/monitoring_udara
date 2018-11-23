<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataSementara extends Model
{
    protected $table = 'data_sementara';
    protected $guarded = ['_token'];
    public $timestamps = true;
    protected $primaryKey = 'id';
}
