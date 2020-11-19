<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\BusController;
use App\Http\Controllers\Admin\DashboardController;

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
Route::redirect('/home', '/admin/dashboards');

// Search
Route::get('/search', [SearchController::class, 'index']);

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth']], function () {
    Route::redirect('/', '/admin/dashboards');

    // Dashboards
    Route::get('/dashboards', [DashboardController::class, 'index']);

    // Buses
    Route::resource('buses', BusController::class);
});