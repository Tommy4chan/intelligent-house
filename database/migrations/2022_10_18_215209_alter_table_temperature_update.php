<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableTemperatureUpdate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('device__temperature__data', function (Blueprint $table) {
            $table->dropColumn('updated_at');
            $table->dateTime('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('device__temperature__data', function (Blueprint $table) {
            $table->dateTime('updated_at')->useCurrent();
            $table->dropColumn('created_at');
        });
    }
}
