<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BusController;
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

Route::get('/', function () {
    return view('search');
});

Route::get('/search', function () {
    return view('search');
});

<<<<<<< Updated upstream
//Auth::routes();
Auth::routes(['register' => false]);
=======
Auth::routes(['register' => true]);
>>>>>>> Stashed changes

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    // Buses
    Route::resource('buses', BusController::class);
});