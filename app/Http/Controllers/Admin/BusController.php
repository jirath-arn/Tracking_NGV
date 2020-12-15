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
    {
        $buses = Bus::all();
        return view('admin.buses.index', compact('buses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $routes = Route::all()->pluck('name_route', 'id')->prepend(trans('global.pleaseSelect'), '');
        return view('admin.buses.create', compact('routes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'route_id' => 'required',
            'license_plate' => 'required|max:10|unique:buses',
        ]);

        $route = Route::find($request->route_id);
        $route->buses()->create([
            'license_plate' => $request->license_plate,
            'latitude' => 14.0695183,
            'longitude' => 100.6032949,
        ]);

        return redirect()->route('admin.buses.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bus  $bus
     * @return \Illuminate\Http\Response
     */
    public function edit(Bus $bus)
    {
        $routes = Route::all()->pluck('name_route', 'id')->prepend(trans('global.pleaseSelect'), '');
        $bus->load('route');
        return view('admin.buses.edit', compact('routes', 'bus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bus  $bus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'route_id' => 'required',
            'license_plate' => 'required|max:10',
        ]);

        $bus = Bus::find($id);
        $bus->route_id = $request->route_id;
        $bus->license_plate = $request->license_plate;
        $bus->save();
        return redirect()->route('admin.buses.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bus  $bus
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bus $bus)
    {
        $bus->delete();
        return redirect()->route('admin.buses.index');
    }
}