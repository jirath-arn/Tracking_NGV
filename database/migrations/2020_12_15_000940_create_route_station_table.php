<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRouteStationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('route_station', function (Blueprint $table) {
            $table->bigInteger('route_id')->unsigned();
            $table->foreign('route_id')->references('id')->on('routes');
            $table->bigInteger('station_id')->unsigned();
            $table->foreign('station_id')->references('id')->on('stations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('route_station');
    }
}
