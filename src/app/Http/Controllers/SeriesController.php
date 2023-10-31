<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index(Request $request)
    {
        $series = [
            'star trek',
            'naruto',
            'hunterXhunter'
        ];

        return view('series.index')->with('series', $series);
    }

    public function create()
    {
        return view('series.create'); 
    }
}
