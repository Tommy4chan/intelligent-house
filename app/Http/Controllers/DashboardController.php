<?php

namespace App\Http\Controllers;

use App\Device;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends DeviceDataApiController
{
    public function home(){
        $deviceId = session('selected_device');
        $device = Device::where('id', $deviceId)->first();
        $relayOne = $this->decodeRelayData($deviceId, 0);
        $relayTwo = $this->decodeRelayData($deviceId, 1);
        $deviceStatus = $this->getDeviceStatus($deviceId);
        $deviceLogs = $this->getDeviceLogs($deviceId, 4);
        $temperatureData = $this->getDeviceTemperatures($deviceId);
        $temperatureDataByDate = $this->getDeviceTemperatureByDate($deviceId, 0, Carbon::today()->format('Y-m-d'));
        return view('dashboard.home')->with('temperatureData', $temperatureData)->with('temperatureDataByDate', $temperatureDataByDate)
        ->with('device', $device)->with('relayOne', $relayOne)->with('relayTwo', $relayTwo)->with('deviceStatus', $deviceStatus)->with('deviceLogs', $deviceLogs);
    }

    public function decodeRelayData($deviceId, $relayNumber){
        $relayData = $this->getRelayData($deviceId, $relayNumber);
        $relayFormatedData = [];
        array_push($relayFormatedData, $relayData['state']);
        if($relayData['state'] == 0){
            array_push($relayFormatedData, 'Увімкнути');
        }
        else{
            array_push($relayFormatedData, 'Вимкнути');
        }
        array_push($relayFormatedData, $relayData['status']);
        if($relayData['status'] == 0){
            array_push($relayFormatedData, 'Вимкнене');
        }
        else{
            array_push($relayFormatedData, 'Увімкнене');
        }
        return $relayFormatedData;
    }

    public function settings(){
        return view('dashboard.settings');
    } 

    public function help(){
        return view('dashboard.help');
    } 

    public function add(){
        return view('dashboard.add');
    } 

    public function add_device(Request $request){
        $deviceExist = Device::where('login', $request->device_login)->where('password', $request->device_password)->first();
        if($deviceExist != NULL){
            $arrayOfDevicessIds = Auth::user()->devices_ids;
            if(!in_array($deviceExist['id'], $arrayOfDevicessIds)){
                array_push($arrayOfDevicessIds, $deviceExist['id']);
                User::where('id', Auth::user()->id)->update(['devices_ids' => $arrayOfDevicessIds]);
                session(['selected_device' => $deviceExist['id']]);
            }
            else{
                dd("device already added");
            }
        }
        else{
            dd("device do not exist");
        }
        return redirect()->route('dashboard.add');
    } 

    public function profile(){
        return view('dashboard.profile');
    } 

    public function save_selected_device($value)
    {
        $availableDevices = Auth::user()->devices_ids;
        if(in_array($value, $availableDevices)){
            session(['selected_device' => $value]);
            return response()->json($value);
        }
        else{
            return response()->json(Auth::user()->devices_ids[0]);
        }

    }
}
