<?php

namespace App\Http\Controllers\Admin;

use App\Models\Bus;
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
        return view('admin.buses.create');
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
            'license_plate' => 'required',
        ]);
        $bus = new Bus;
        $bus->ngv_number = $request->ngv_number;
        $bus->license_plate = $request->license_plate;
        $bus->save();
        return redirect()->route('admin.buses.index')->with('success', 'Bus has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bus  $bus
     * @return \Illuminate\Http\Response
     */
    public function show(Bus $bus)
    {
        return view('admin.buses.show', compact('bus'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bus  $bus
     * @return \Illuminate\Http\Response
     */
    public function edit(Bus $bus)
    {
        return view('admin.buses.edit', compact('bus'));
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
            'license_plate' => 'required',
        ]);
        $bus = Bus::find($id);
        $bus->ngv_number = $request->ngv_number;
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