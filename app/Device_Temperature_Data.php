<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Device_Temperature_Data extends Model
{
    protected $fillable = ['number', 'temperature'];
    
    protected $hidden = ['device_id', 'id', 'created_at'];

    public $timestamps=false;
}
