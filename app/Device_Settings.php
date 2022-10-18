<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Device_Settings extends Model
{
    protected $fillable = ['device_id', 'failsafe', 'wifi_ssid', 'wifi_password'];
    public $timestamps = false;
}
