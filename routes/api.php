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
    Route::post("/post/temperature", 'DeviceApiController@postTemperatureData');
    Route::post("/post/relay", 'DeviceApiController@postRelayData');
    Route::get("/get/relay/{api_token}/{number}", 'DeviceApiController@getRelayData');
    Route::get("/get/settings/{api_token}", 'DeviceApiController@getDeviceSettings');
    Route::get("/get/custom_function/{api_token}/{number}", 'DeviceApiController@getDeviceCustomFunctions');
    Route::get("/get/sync_type/{api_token}", 'DeviceApiController@getDeviceSyncType');
});

Route::post("/device", 'DeviceDataApiController@addNewDevice');



