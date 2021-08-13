<?php

namespace App\Services;

use App\Models\Season;
use App\Models\Serie;
use Illuminate\Support\Facades\DB;

class CreateSerieService
{
    public function create(string $name, int $seasons_amount, int $episodes_amount): Serie
    {   
        DB::beginTransaction();

        $serie = Serie::create(['name' => $name]);
        $this->createSeason($serie, $seasons_amount, $episodes_amount);
        
        DB::commit();

        return $serie;
    }

    private function createSeason(Serie $serie, int $seasons_amount, int $episodes_amount): void
    {
        for ($i = 1; $i <= $seasons_amount; $i++) {
            $season = $serie->seasons()->create(['season_number' => $i]);
            $this->createEpisode($season, $episodes_amount);
        }
    }

    private function createEpisode(Season $season, int $episodes_amount): void
    {
        for ($i = 1; $i <= $episodes_amount; $i++) {
            $season->episodes()->create(['episode_number' => $i]);
        }
    }
}