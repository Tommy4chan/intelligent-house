<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeviceApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'device'], function(){
    Route::group(['prefix' => 'post'], function(){
        Route::post("/temperature", 'DeviceApiController@postTemperatureData');
        Route::post("/relay", 'DeviceApiController@postRelayData');
    });
    Route::group(['prefix' => 'get'], function(){
        Route::get("/relay/{api_token}/{number}", 'DeviceApiController@getRelayData');
        Route::get("/settings/{api_token}", 'DeviceApiController@getSettings');
        Route::get("/custom_function/{api_token}/{number}", 'DeviceApiController@getCustomFunction');
        Route::get("/sync_type/{api_token}", 'DeviceApiController@getSyncType');
    });
});

Route::middleware('auth:api')->group(function () {
    Route::group(['prefix' => 'data'], function(){
        Route::post("/device", 'DeviceDataApiController@addNewDevice');
        Route::group(['prefix' => 'post'], function(){
            Route::post("/relay", 'DeviceDataApiController@postDeviceRelayData');
            Route::post("/device/settings/name", 'DeviceDataApiController@postDeviceSettingsName');
            Route::post("/device/settings/failsafe", 'DeviceDataApiController@postDeviceSettingsFailsafe');
            Route::post("/device/settings/flash", 'DeviceDataApiController@postDeviceSettingsFlash');
            Route::post("/device/settings/delete", 'DeviceDataApiController@postDeviceSettingsDelete');
            Route::post("/device/settings/custom_function", 'DeviceDataApiController@postDeviceSettingsCustomFunction');
            Route::post("/device/settings/wifi", 'DeviceDataApiController@postDeviceSettingsWifi');
        });
        Route::group(['prefix' => 'get'], function(){
            Route::get("/gentemp/{device_id}/{number}", 'DeviceDataApiController@generateTemperature');
            Route::get("/relay/{device_id}/{number}", 'DeviceDataApiController@getRelayData');
            Route::get("/temperatures/{device_id}", 'DeviceDataApiController@getDeviceTemperatures');
            Route::get("/temperature/{device_id}/{temperature_number}/{date}", 'DeviceDataApiController@getDeviceTemperatureByDate');
            Route::get("/status/{device_id}/", 'DeviceDataApiController@getDeviceStatus');
            Route::get("/logs/{device_id}/{logs_number}", 'DeviceDataApiController@getDeviceLogs');
            Route::get("/settings/{device_id}", 'DeviceDataApiController@getDeviceSettings');
            Route::get("/custom_function/{device_id}/{number}", 'DeviceDataApiController@getDeviceCustomFunction');
        });
    });
});





