<?php

namespace Database\Seeders;

use App\Models\Station;
use App\Models\Route;
use Illuminate\Database\Seeder;

class RouteStationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $stations = Station::all();
        Route::findOrFail(1)->stations()->sync($stations->pluck('id'));
        Route::findOrFail(2)->stations()->sync($stations->pluck('id'));
        Route::findOrFail(3)->stations()->sync($stations->pluck('id'));
        Route::findOrFail(4)->stations()->sync($stations->pluck('id'));
        Route::findOrFail(5)->stations()->sync($stations->pluck('id'));
        Route::findOrFail(6)->stations()->sync($stations->pluck('id'));
    }
}
