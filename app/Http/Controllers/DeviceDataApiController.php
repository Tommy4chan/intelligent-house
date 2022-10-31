<?php

namespace App\Http\Controllers;

use App\Device;
use App\Device_Custom_Functions;
use App\Device_Logs;
use App\Device_Relay_Data;
use App\Device_Settings;
use App\Device_Temperature_Data;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    function generateTemperature($device_id, $date){
        if($this->isUserOwnerOfDevice($device_id)){
            for ($i=0; $i < 22; $i++) {
                for ($x=0; $x < 6; $x++) { 
                    if($i == 10){
                        break;
                    }
                    $temperature = new Device_Temperature_Data();
                    $temperature->device_id = $device_id;
                    $temperature->number = $x;
                    $temperature->temperature = rand(-2000, 8000) / 100;
                    $temperature->created_at = Carbon::createFromFormat('Y-m-d H:i:s',  $date . ' ' . $i . ':' . '05' . ':00');
                    $temperature->save();
                    $temperature = new Device_Temperature_Data();
                    $temperature->device_id = $device_id;
                    $temperature->number = $x;
                    $temperature->temperature = rand(-2000, 8000) / 100;
                    $temperature->created_at = Carbon::createFromFormat('Y-m-d H:i:s',  $date . ' ' . $i . ':' . '10' . ':15'); 
                    $temperature->save();
                    $temperature = new Device_Temperature_Data();
                    $temperature->device_id = $device_id;
                    $temperature->number = $x;
                    $temperature->temperature = rand(-2000, 8000) / 100;
                    $temperature->created_at = Carbon::createFromFormat('Y-m-d H:i:s',  $date . ' ' . $i . ':' . '15' . ':30'); 
                    $temperature->save();
                    $temperature = new Device_Temperature_Data();
                    $temperature->device_id = $device_id;
                    $temperature->number = $x;
                    $temperature->temperature = rand(-2000, 8000) / 100;
                    $temperature->created_at = Carbon::createFromFormat('Y-m-d H:i:s',  $date . ' ' . $i . ':' . '20' . ':45'); 
                    $temperature->save();
                }
            }
        }
    }

    public function createNewLog($device_id, $type){
        $log = new Device_Logs();
        $log->device_id = $device_id;
        $log->log_type = $type;
        $log->save();
    }

    function isUserOwnerOfDevice($device_id){
        $user_devices_id = Auth::user()->devices_ids;
        foreach($user_devices_id as $id){
            if($id == $device_id){
                return true;
            }
        }
        return false;
    }

    public function postDeviceRelayData(Request $request){
        $device_id = $request->device_id;
        if($this->isUserOwnerOfDevice($device_id)){
            $device = Device::where('id', $device_id)->first();
            if($request->state == 0){
                $this->createNewLog($device_id, '22' . $request->number);
            }
            else{
                $this->createNewLog($device_id, '21' . $request->number);
            }
            $relaysData = $device->relayData;
            $relay = $relaysData[$request->number];
            $relay->state = $request->state;
            $relay->save();
            return 'ok';
        }
    }

    public function getRelayData($device_id, $number){
        if($this->isUserOwnerOfDevice($device_id)){
            $device = Device::where('id', $device_id)->first();
            $relaysData = $device->relayData;
            $relay = $relaysData[$number];
            return $relay;
        }
    }
    
    public function getDeviceTemperatures($device_id){
        if($this->isUserOwnerOfDevice($device_id)){
            $device = Device::where('id', $device_id)->first();
            $temperatureData = [];
            for ($i=0; $i < 6; $i++) { 
                array_push($temperatureData, sprintf('%0.2f', $device->temperature()->where('number', $i)->whereDate('created_at', Carbon::today()->format('Y-m-d'))->latest()->first()["temperature"]));
            }
            return $temperatureData;
        }
    }

    public function getDeviceTemperatureByDate($device_id, $temperature_number, $date){
        if($this->isUserOwnerOfDevice($device_id)){
            $device = Device::where('id', $device_id)->first();
            $temperatureDataByDate = [];
            for ($i=0; $i < 24; $i++) {
                $avgTemperature = $device->temperature()->where('number', $temperature_number)->whereDate('created_at', $date)->whereTime('created_at', '>=', $i . ':00:00')->whereTime('created_at', '<=', $i . ':59:59')->avg("temperature");
                if($avgTemperature != null){
                    array_push($temperatureDataByDate, sprintf('%0.2f', $avgTemperature));
                }
                else{
                    array_push($temperatureDataByDate, -255);
                }
            }
            if($date == Carbon::today()->format('Y-m-d')){
                array_push($temperatureDataByDate, sprintf('%0.2f', $device->temperature()->where('number', $temperature_number)->whereDate('created_at', $date)->orderBy('id', 'desc')->first()["temperature"]));
            }
            else{
                array_push($temperatureDataByDate, max($temperatureDataByDate) == -255 ? '0.00' : max($temperatureDataByDate) );
            }
            array_push($temperatureDataByDate, sprintf('%0.2f', $device->temperature()->where('number', $temperature_number)->whereDate('created_at', $date)->orderBy('id', 'desc')->min("temperature")));
            array_push($temperatureDataByDate, sprintf('%0.2f', $device->temperature()->where('number', $temperature_number)->whereDate('created_at', $date)->orderBy('id', 'desc')->max("temperature")));
            array_push($temperatureDataByDate, $temperature_number);
            return $temperatureDataByDate;
        }
    }

    public function getDeviceStatus($device_id){
        if($this->isUserOwnerOfDevice($device_id)){
            $device = Device::where('id', $device_id)->first();
            $deviceStatus = ['error', 'error', 'error', 'error'];
            $lastRebootTime = $device->logs()->where('log_type', 11)->latest()->first();
            $deviceStatus[0] = $device['updated_at'];
            if($lastRebootTime){
                $deviceStatus[1] = $lastRebootTime['created_at'];
            }
            $deviceStatus[2] = $device['firmware_version'];
            $deviceStatus[3] = $device->settingsData()->first()['wifi_ssid'];
            return $deviceStatus;
        }
    }

    public function getDeviceLogs($device_id, $logs_count){
        if($this->isUserOwnerOfDevice($device_id)){
            $device = Device::where('id', $device_id)->first();
            $deviceLogs = [];
            foreach($device->logs()->latest()->take($logs_count)->get() as $log)
                array_push($deviceLogs, trans('logs.' . $log['log_type']) . $log['created_at']->format('Y-m-d H:i'));
            return $deviceLogs;
        }
    }
}
