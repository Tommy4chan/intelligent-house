<?php

namespace App\Http\Controllers;

use App\Device;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function home(){

        return view('dashboard.home');
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
