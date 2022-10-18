<?php

namespace App\Http\Controllers;

use App\Device;
use App\Device_Temperature_Data;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DeviceApiController extends Controller
{
    public function postTemperatureData(Request $request){
        $deviceExist = Device::where('api_token', $request->api_token)->first();
        if($deviceExist != NULL){
            $deviceExist->update(['updated_at' => Carbon::now()]);
            $device_temperature = new Device_Temperature_Data();
            $device_temperature->device_id = $request->device_id;
            $device_temperature->temperature = $request->temperature;
            $device_temperature->save();
            return("200");
        }
    }

    public function postRelayData(Request $request){
        $deviceExist = Device::where('api_token', $request->api_token)->first();
        if($deviceExist != NULL){
            $relaysData = $deviceExist->relayData;
            $relay = $relaysData[$request->number];
            $relay->status = $request->status;
            $relay->save();
            return("200");
        }
    }

    public function getRelayData($api_token, $number){ //http://intelligent-house.pp.ua/api/device/get/relay/G2fUslvv7ulORTqlQYqF6KMrX8rG6YDH/0
        $deviceExist = Device::where('api_token', $api_token)->first();
        if($deviceExist != NULL){
            $relaysData = $deviceExist->relayData;
            $relay = $relaysData[$number];
            return($relay);
        }
    }

    public function getDeviceSettings($api_token){
        $deviceExist = Device::where('api_token', $api_token)->first();
        if($deviceExist != NULL){
            $settingsData = $deviceExist->settingsData;
            return($settingsData[0]);
        }
    }

    public function getDeviceCustomFunctions($api_token, $number){
        $deviceExist = Device::where('api_token', $api_token)->first();
        if($deviceExist != NULL){
            $customFunctionsData = $deviceExist->customFunctionsData;
            $customFunction = $customFunctionsData[$number];
            return($customFunction);
        }
    }

}
