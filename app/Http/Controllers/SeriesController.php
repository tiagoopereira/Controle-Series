<?php

namespace App\Http\Controllers;

use App\Serie;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index(): View
    {
        $series = Serie::all();

        return view('series.index', compact('series'));
    }

    public function create(): View
    {
        return view('series.create');
    }

    public function store(Request $request)
    {
        $name = $request->name;

        Serie::create([
            'name' => $name
        ]);

        return redirect('/series');
    }
}