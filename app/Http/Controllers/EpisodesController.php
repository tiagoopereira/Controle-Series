<?php

namespace App\Http\Controllers;

use App\Models\Season;
use Illuminate\View\View;

class EpisodesController extends Controller
{
    public function index(int $seasonId): View
    {
        $season = Season::find($seasonId);
        $episodes = $season->episodes;

        return view('episodes.index', compact('episodes', 'season'));
    }
}
