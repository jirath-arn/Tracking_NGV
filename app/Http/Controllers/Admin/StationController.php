<?php

namespace App\Http\Controllers\Admin;

use App\Models\Station;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$data['stations'] = Station::orderBy('id', 'desc')->paginate();
        //return view('admin.stations.index', $data);

        $stations = Station::all();
        return view('admin.stations.index', compact('stations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('admin.stations.create');
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
            'name_station' => 'required|max:255|unique:stations',
            'latitude' => 'required',
            'longitude' => 'required',
        ]);

        $station = new Station;
        $station->name_station = $request->name_station;
        $station->latitude = $request->latitude;
        $station->longitude = $request->longitude;
        $station->save();
        //return redirect()->route('admin.stations.index')->with('success', 'Station has been created successfully.');
        return redirect()->route('admin.stations.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Station  $station
     * @return \Illuminate\Http\Response
     */
    public function edit(Station $station)
    {
        return view('admin.stations.edit', compact('station'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Station  $station
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name_station' => 'required|max:255|unique:stations',
            'latitude' => 'required',
            'longitude' => 'required',
        ]);
        
        $station = Station::find($id);
        $station->name_station = $request->name_station;
        $station->latitude = $request->latitude;
        $station->longitude = $request->longitude;
        $station->save();
        //return redirect()->route('admin.stations.index')->with('success', 'Station has been updated successfully.');
        return redirect()->route('admin.stations.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Station  $station
     * @return \Illuminate\Http\Response
     */
    public function destroy(Station $station)
    {
        $station->delete();
        //return redirect()->route('admin.stations.index')->with('success', 'Station has been deleted successfully.');
        return redirect()->route('admin.stations.index');
    }
}
