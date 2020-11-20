<?php

namespace App\Http\Controllers\Admin;

use App\Models\Route;
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
        $data['routes'] = Route::orderBy('id','desc')->paginate(5);
        return view('admin.routes.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
     public function create()
     {
         return view('admin.routes.create');
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
            'name_route' => 'required',
            'order_of_bus' => 'required',
        ]);
        $route = new Route;
        $route->name_route = $request->name_route;
        $route->order_of_bus = $request->order_of_bus;
        $route->save();
        return redirect()->route('admin.routes.index')->with('success','Route has been created successfully.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Route  $route
     * @return \Illuminate\Http\Response
     */
    public function show(Route $route)
    {
        return view('admin.routes.show',compact('route'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Route  $route
     * @return \Illuminate\Http\Response
     */
    public function edit(Route $route)
    {
        return view('admin.routes.edit',compact('route'));
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
            'name_route' => 'required',
            'order_of_bus' => 'required',
        ]);
        $route = Route::find($id);
        $route->name_route = $request->name_route;
        $route->order_of_bus = $request->order_of_bus;
        $route->save();
        return redirect()->route('admin.routes.index')->with('success','Route has been updated successfully.');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Route  $route
     * @return \Illuminate\Http\Response
     */
    public function destroy(Route $route)
    {
        $route->delete();
        return redirect()->route('admin.routes.index')->with('success','Route has been deleted successfully.');
    }
}