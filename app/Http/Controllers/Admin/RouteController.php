<?php

namespace App\Http\Controllers\Admin;

use App\Models\Route;
use App\Models\Station;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RouteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $routes = Route::all();
        return view('admin.routes.index', compact('routes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $stations = Station::all()->pluck('name_station', 'id');
        return view('admin.routes.create', compact('stations'));
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
            'name_route' => 'required|max:10|unique:routes',
            'stations' => 'required',
        ]);

        $route = Route::create($request->all());
        $route->stations()->sync($request->input('stations', []));
        return redirect()->route('admin.routes.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Route  $route
     * @return \Illuminate\Http\Response
     */
    public function edit(Route $route)
    {
        $stations = Station::all()->pluck('name_station', 'id');
        $route->load('stations');
        return view('admin.routes.edit', compact('stations', 'route'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Route  $route
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name_route' => 'required|max:10',
            'stations' => 'required',
        ]);

        $route = Route::find($id);
        $route->update($request->all());
        $route->stations()->sync($request->input('stations', []));
        return redirect()->route('admin.routes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Route  $route
     * @return \Illuminate\Http\Response
     */
    public function destroy(Route $route)
    {
        $route->buses()->delete();
        $route->stations()->sync([]);
        $route->delete();
        return redirect()->route('admin.routes.index');
    }
}