<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Device_Relay_Data extends Model
{
    protected $fillable = ['device_id', 'number', 'state', 'status'];
    
    protected $hidden = ['device_id', 'id'];
    public $timestamps = false;
}
