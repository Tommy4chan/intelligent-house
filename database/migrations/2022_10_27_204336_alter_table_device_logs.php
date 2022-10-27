<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableDeviceLogs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('device__logs', function (Blueprint $table) {
            $table->dropColumn('updated_at');
            $table->integer('device_id')->after('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('device__logs', function (Blueprint $table) {
            $table->dateTime('updated_at')->useCurrent();
            $table->dropColumn('device_id');
        });
    }
}
