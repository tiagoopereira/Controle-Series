<?php

namespace App\Http\Controllers;

use App\Models\Season;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class EpisodesController extends Controller
{
    public function index(int $seasonId): View
    {
        $season = Season::find($seasonId);
        $episodes = $season->episodes;

        return view('episodes.index', compact('episodes', 'season'));
    }

    public function watch(int $seasonId, Request $request): RedirectResponse
    {
        $episodesId = $request->episodes ? $request->episodes : [];
        $season = Season::find($seasonId);
        $episodes = $season->episodes;

        $episodes->each(function ($episode) use ($episodesId) {
            $episode->watched = in_array($episode->id, $episodesId);
        });

        $season->push();

        return redirect()->back();
    }
}
