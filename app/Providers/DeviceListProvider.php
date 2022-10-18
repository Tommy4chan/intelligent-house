<?php

namespace App\Providers;

use App\Device;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class DeviceListProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('dashboard.layouts.sidebar', function($view) {
            $devices = [];
            foreach(Auth::user()->devices_ids as $device_id){
                array_push($devices, Device::where('id', $device_id)->first());
            }

            $view->with('devices', $devices);
        });
    }
}
