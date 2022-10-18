<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    protected $fillable = ['name', 'sync_type', 'updated_at'];

    public function isOnline(){
        if($this->updated_at->lt(Carbon::now()->subMinutes(15))){
            return 'class="negative">Офлайн</span>';
        }
        else{
            return 'class="positive">Онлайн</span>';
        }
    }

    public function relayData(){
        return $this->hasMany(Device_Relay_Data::class);
    }

    public function settingsData(){
        return $this->hasOne(Device_Settings::class);
    }

    public function customFunctionsData(){
        return $this->hasMany(Device_Custom_Functions::class);
    }

    public function temperature(){
        return $this->hasMany(Device_Temperature_Data::class);
    }

    public function isSelected(){
        if(session('selected_device') == $this->id){
            return 'choosed';
        }
    }
}
