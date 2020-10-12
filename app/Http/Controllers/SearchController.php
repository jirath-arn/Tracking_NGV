<?php

namespace App\Http\Controllers;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        return redirect('/search');
    }

    public function search(Request $request)
    {
        if(isset($_GET['currentPosition'])) {
            $currentPosition = $_GET['currentPosition'];
        }

        if(isset($_GET['destination'])) {
            $destination = $_GET['destination'];
        }

        return view('search');
    }
}