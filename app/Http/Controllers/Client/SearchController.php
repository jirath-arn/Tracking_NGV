<?php

namespace App\Http\Controllers\Client;

use App\Models\Station;
use App\Models\Route;
use App\Models\Bus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        return view('client.search');
    }

    public function map_location()
    {
        $data['buses'] = Bus::join('routes', 'buses.route_id', '=', 'routes.id')->paginate();
        $data['stations'] = Station::all();
        $routes = Route::all();
        return view('client.search', $data, compact('routes'));
    }
}