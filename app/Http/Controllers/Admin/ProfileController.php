<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
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

        $user = Auth::user();
        return view('admin.profiles.show', compact('user'));
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
            'name' => 'required|max:100',
            'email' => 'required|email|max:255', //|unique:users
        ]);

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        //return redirect()->route('admin.buses.index')->with('success', 'Bus has been updated successfully.');
        return redirect()->route('admin.profiles.index');
    }
}
