<?php

namespace App\Http\Controllers;

use App\Device;
use App\Device_Temperature_Data;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DeviceApiController extends Controller
{
    public function postTemperatureData(Request $request){
        $device = Device::where('api_token', $request->api_token)->first();
        if($device != NULL){
            $device->update(['updated_at' => Carbon::now()]);
            $device_temperature = new Device_Temperature_Data();
            $device_temperature->device_id = $device->id;
            $device_temperature->number = $request->number;
            $device_temperature->temperature = $request->temperature;
            $device_temperature->save();
            return("ok");
        }
    }

    public function postRelayData(Request $request){
        $device = Device::where('api_token', $request->api_token)->first();
        if($device != NULL){
            $relaysData = $device->relayData;
            $relay = $relaysData[$request->number];
            $relay->status = $request->status;
            $relay->save();
            return("ok");
        }
    }

    public function getRelayData($api_token, $number){ //http://intelligent-house.pp.ua/api/device/get/relay/G2fUslvv7ulORTqlQYqF6KMrX8rG6YDH/0
        $device = Device::where('api_token', $api_token)->first();
        if($device != NULL){
            $relaysData = $device->relayData;
            $relay = $relaysData[$number];
            return($relay);
        }
    }

    public function getSettings($api_token){
        $device = Device::where('api_token', $api_token)->first();
        if($device != NULL){
            $settingsData = $device->settingsData;
            return($settingsData);
        }
    }

    public function getCustomFunction($api_token, $number){
        $device = Device::where('api_token', $api_token)->first();
        if($device != NULL){
            $customFunctionsData = $device->customFunctionsData;
            $customFunction = $customFunctionsData[$number];
            return($customFunction);
        }
    }

    public function getSyncType($api_token){
        $device = Device::where('api_token', $api_token)->first();
        if($device != NULL){
            $syncType = $device->sync_type;
            return($syncType);
        }
    }

}
