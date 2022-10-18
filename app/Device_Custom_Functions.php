<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Device_Custom_Functions extends Model
{
    protected $fillable = ['device_id', 'function'];

    protected $hidden = ['device_id', 'id'];

    public $timestamps = false;
}
