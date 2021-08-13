<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Contracts\View\View;

class SeasonsController extends Controller
{
    public function index(int $serieId): View
    {
        $serie = Serie::find($serieId);
        $seasons = $serie->seasons;

        return view('seasons.index', compact('seasons', 'serie'));
    }
}