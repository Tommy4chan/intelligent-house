<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes(
    [
        'reset' => false,
        'confirm' => false,
        'verify' => false
    ]
);

Route::middleware(['auth'])->group(function () {
    Route::group(['prefix' => 'dashboard'], function(){
        Route::get('/home', 'DashboardController@home')->name('dashboard.home');
        Route::get('/settings', 'DashboardController@settings')->name('dashboard.settings');
        Route::get('/help', 'DashboardController@help')->name('dashboard.help');
        Route::get('/add', 'DashboardController@add')->name('dashboard.add');
        Route::get('/profile', 'DashboardController@profile')->name('dashboard.profile');
        Route::get('/logout', 'Auth\LoginController@logout')->name('dashboard.logout');
        Route::post('/add-device', 'DashboardController@add_device')->name('dashboard.add_device');
        Route::get('/select/{value}', 'DashboardController@save_selected_device')->name('selected.device');
    });
});






Auth::routes();
