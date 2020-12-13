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
        $data['buses'] = Bus::orderBy('id', 'desc')->paginate();
        return view('admin.buses.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $data['routes'] = Route::orderBy('id', 'asc')->paginate();
        return view('admin.buses.create', $data);
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
            'ngv_number' => 'required',
            'license_plate' => 'required|max:10',
        ]);

        $route = Route::find($request->ngv_number);

        $route->buses()->create([
            'license_plate' => $request->license_plate,
            'latitude' => 14.0695183,
            'longitude' => 100.6032949,
        ]);

        return redirect()->route('admin.buses.index')->with('success', 'Bus has been created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bus  $bus
     * @return \Illuminate\Http\Response
     */
    public function edit(Bus $bus)
    {
        $data['routes'] = Route::orderBy('id', 'asc')->paginate();
        return view('admin.buses.edit', $data, compact('bus'));
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
            'ngv_number' => 'required',
            'license_plate' => 'required|max:10',
        ]);

        $bus = Bus::find($id);
        $bus->route_id = $request->ngv_number;
        $bus->license_plate = $request->license_plate;
        $bus->save();
        return redirect()->route('admin.buses.index')->with('success', 'Bus has been updated successfully.');
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
        return redirect()->route('admin.buses.index')->with('success', 'Bus has been deleted successfully.');
    }
}