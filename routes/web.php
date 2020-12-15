<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\BusController;
use App\Http\Controllers\Admin\RouteController;
use App\Http\Controllers\Admin\StationController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProfileController;

use App\Http\Controllers\Client\SearchController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/test', function () {
    return view('admin.buses.testbus');
});*/
//Route::get('/test', [BusController::class, 'index']);


Route::redirect('/', '/search');
Route::redirect('/home', '/admin/dashboards');

// Search
Route::get('/search', [SearchController::class, 'map_location']);

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth']], function () {
    Route::redirect('/', '/admin/dashboards');

    // Dashboards
    Route::get('/dashboards', [DashboardController::class, 'index']);

    // Buses
    Route::resource('buses', BusController::class);

    // Routes
    Route::resource('routes', RouteController::class);

    // Stations
    Route::resource('stations', StationController::class);

    // Users
    Route::resource('users', UserController::class);

    // Profiles
    Route::resource('profiles', ProfileController::class);
});