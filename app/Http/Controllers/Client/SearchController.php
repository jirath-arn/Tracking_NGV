<?php

namespace App\Http\Controllers\Client;

use App\Models\Station;
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
        $data['stations'] = Station::orderBy('id', 'desc')->paginate(5);
        return view('client.search', $data);
    }
}