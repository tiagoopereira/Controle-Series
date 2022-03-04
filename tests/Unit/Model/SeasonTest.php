<?php

namespace Tests\Unit;

use App\Models\Episode;
use App\Models\Season;
use Tests\TestCase;

class SeasonTest extends TestCase
{
    private Season $season;

    protected function setUp(): void
    {
        parent::setUp();

        $episodeOne = new Episode();
        $episodeOne->watched = true;

        $episodeTwo = new Episode();
        $episodeTwo->watched = true;

        $episodeThree = new Episode();
        $episodeThree->watched = false;

        $season = new Season();
        $season->episodes->add($episodeOne);
        $season->episodes->add($episodeTwo);
        $season->episodes->add($episodeThree);

        $this->season = $season;
    }

    public function testAllEpisodesAreCreated(): void
    {
        $this->assertCount(3, $this->season->episodes);
    }

    public function testWatchedEpisodesAreWatched(): void
    {
        $watchedEpisodes = $this->season->watchedEpisodes();

        $this->assertCount(2, $watchedEpisodes);

        foreach ($watchedEpisodes as $watchedEpisode) {
            $this->assertTrue($watchedEpisode->watched);
        }
    }
}
