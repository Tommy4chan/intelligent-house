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
            $device_temperature->device_id = $request->device_id;
            $device_temperature->temperature = $request->temperature;
            $device_temperature->save();
            return("200");
        }
    }

    public function postRelayData(Request $request){
        $device = Device::where('api_token', $request->api_token)->first();
        if($device != NULL){
            $relaysData = $device->relayData;
            $relay = $relaysData[$request->number];
            $relay->status = $request->status;
            $relay->save();
            return("200");
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

    public function getDeviceSettings($api_token){
        $device = Device::where('api_token', $api_token)->first();
        if($device != NULL){
            $settingsData = $device->settingsData;
            return($settingsData[0]);
        }
    }

    public function getDeviceCustomFunctions($api_token, $number){
        $device = Device::where('api_token', $api_token)->first();
        if($device != NULL){
            $customFunctionsData = $device->customFunctionsData;
            $customFunction = $customFunctionsData[$number];
            return($customFunction);
        }
    }

    public function getDeviceSyncType($api_token){
        $device = Device::where('api_token', $api_token)->first();
        if($device != NULL){
            $syncType = $device->sync_type;
            return($syncType);
        }
    }

}
