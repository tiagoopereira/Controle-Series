<?php

namespace App\Services;

use App\Models\{Serie, Season, Episode};
use Illuminate\Support\Facades\DB;

class DeleteSerieService
{
    public function delete(int $serieId): void
    {   
        DB::transaction(function() use ($serieId) {
            $serie = Serie::find($serieId);
            $this->deleteSeasons($serie);
            $serie->delete();
        });
    }

    private function deleteSeasons(Serie $serie): void
    {
        $serie->seasons->each(function(Season $season) {
           $this->deleteEpisodes($season);
           $season->delete();
        });
    }

    private function deleteEpisodes(Season $season): void
    {
        $season->episodes()->each(function(Episode $episode) {
            $episode->delete();
        });
    }
}