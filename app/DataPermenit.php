<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataPermenit extends Model
{
    protected $table = 'data_permenit';
    protected $guarded = ['_token'];
    public $timestamps = true;
    protected $primaryKey = 'id';
}
