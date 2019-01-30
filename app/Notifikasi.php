<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notifikasi extends Model
{
    protected $table = 'notifikasi';
    protected $guarded = ['_token'];
    public $timestamps = true;
    protected $primaryKey = 'id';
}
