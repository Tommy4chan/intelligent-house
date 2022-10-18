<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeviceSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('device__settings', function (Blueprint $table) {
            $table->id();
            $table->integer('device_id');
            $table->boolean('failsafe')->default(true);
            $table->string('wifi_ssid')->default("somename");
            $table->string('wifi_password')->default("somepassword");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('device__settings');
    }
}
