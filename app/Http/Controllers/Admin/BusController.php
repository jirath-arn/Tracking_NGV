<?php

namespace App\Http\Controllers\Admin;

use App\Models\Bus;
use App\Models\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { echo "18TC "; 
        echo "19TC "; $buses = Bus::all();
        echo "20TC "; return view('admin.buses.index', compact('buses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    { echo "30TC "; 
        echo "31TC "; $routes = Route::all()->pluck('name_route', 'id')->prepend(trans('global.pleaseSelect'), '');
        echo "32TC "; return view('admin.buses.create', compact('routes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { echo "42TC "; 
        echo "43TC "; $request->validate([
            'route_id' => 'required',
            'license_plate' => 'required|max:10|unique:buses',
        ]); echo "46TC "; 
        echo "47TC "; 
        echo "48TC "; $route = Route::find($request->route_id);
        echo "49TC "; $route->buses()->create([
            'license_plate' => $request->license_plate,
            'latitude' => 14.0695183,
            'longitude' => 100.6032949,
        ]); echo "53TC "; 
        echo "54TC "; 
        echo "55TC "; return redirect()->route('admin.buses.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bus  $bus
     * @return \Illuminate\Http\Response
     */
    public function edit(Bus $bus)
    { echo "65TC "; 
        echo "66TC "; $routes = Route::all()->pluck('name_route', 'id')->prepend(trans('global.pleaseSelect'), '');
        echo "67TC "; $bus->load('route');
        echo "68TC "; return view('admin.buses.edit', compact('routes', 'bus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bus  $bus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    { echo "79TC "; 
        echo "80TC "; $request->validate([
            'route_id' => 'required',
            'license_plate' => 'required|max:10',
        ]); echo "83TC "; 
        echo "84TC "; 
        echo "85TC "; $bus = Bus::find($id);
        echo "86TC "; $bus->route_id = $request->route_id;
        echo "87TC "; $bus->license_plate = $request->license_plate;
        echo "88TC "; $bus->save();
        echo "89TC "; return redirect()->route('admin.buses.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bus  $bus
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bus $bus)
    { echo "99TC ";
        echo "100TC "; $bus->delete();
        echo "101TC "; return redirect()->route('admin.buses.index');
    }
}