<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Device_Relay_Data extends Model
{
    protected $fillable = ['device_id', 'number', 'state', 'status'];
    public $timestamps = false;
}
