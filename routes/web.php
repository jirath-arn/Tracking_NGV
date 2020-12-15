<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\BusController;
use App\Http\Controllers\Admin\RouteController;
use App\Http\Controllers\Admin\StationController;
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

Route::redirect('/', '/search');
Route::redirect('/home', '/admin/buses');

// Search
Route::get('/search', [SearchController::class, 'map_location']);

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth']], function () {
    Route::redirect('/', '/admin/buses');

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

    // Passwords
    Route::get('/passwords', [ProfileController::class, 'editPassword']);
    Route::put('/passwords/{user}',[ProfileController::class , 'updatePassword']);
});