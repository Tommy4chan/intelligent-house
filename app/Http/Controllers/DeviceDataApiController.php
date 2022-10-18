<?php

namespace App\Http\Controllers;

use App\Device;
use App\Device_Custom_Functions;
use App\Device_Relay_Data;
use App\Device_Settings;
use App\Device_Temperature_Data;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DeviceDataApiController extends Controller
{
    public function addNewDevice(Request $request){
        $device = new Device();
        $device->name = $request->name;
        $device->login = Str::random(15);
        $device->password = Str::random(15);
        $device->api_token = Str::random(32);
        $device->save();

        $device_settings = new Device_Settings();
        $device_settings->device_id = $device->id;
        $device_settings->save();

        for ($i=0; $i < 5; $i++) {
            $device_custom_functions = new Device_Custom_Functions();
            $device_custom_functions->device_id = $device->id;
            $device_custom_functions->function = "[0,0,0,0,0,0,0]";
            $device_custom_functions->save();
        }

        for ($i=0; $i < 2; $i++) {
            $device_relay_data = new Device_Relay_Data();
            $device_relay_data->device_id = $device->id;
            $device_relay_data->save();
        }
    }
}
