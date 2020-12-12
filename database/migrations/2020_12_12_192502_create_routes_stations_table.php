<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoutesStationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('routes_stations', function (Blueprint $table) {
            $table->bigInteger('route_id')->unsigned();
            $table->foreign('route_id')->references('route_id')->on('routes');
            $table->bigInteger('station_id')->unsigned();
            $table->foreign('station_id')->references('station_id')->on('stations');
            $table->integer('order')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('routes_stations');
    }
}
