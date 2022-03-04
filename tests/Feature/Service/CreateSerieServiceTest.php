<?php

namespace App\Services;

use Tests\TestCase;
use App\Models\Serie;
use App\Models\Season;
use App\Models\Episode;
use App\Services\CreateSerieService;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateSerieServiceTest extends TestCase
{
    use RefreshDatabase;

    private CreateSerieService $service;

    protected function setUp(): void
    {
        parent::setUp();

        $this->service = new CreateSerieService();
    }

    public function testCreateSerie(): void
    {
        $serie = $this->service->create('How I Met Your Mother', 9, 24);
        $seasons = $serie->seasons;
        $firstSeason = $seasons->first();
        $firstEpisode = $firstSeason->episodes->first();

        $this->assertInstanceOf(Serie::class, $serie);
        $this->assertEquals('How I Met Your Mother', $serie->name);
        $this->assertInstanceOf(Season::class, $firstSeason);
        $this->assertCount(9, $seasons);
        $this->assertCount(24, $firstSeason->episodes);
        $this->assertInstanceOf(Episode::class, $firstEpisode);
        $this->assertEquals(0, $firstEpisode->watched);

        $this->assertDatabaseHas('series', ['name' => 'How I Met Your Mother']);
        $this->assertDatabaseHas('seasons', ['serie_id' => $serie->id]);
        $this->assertDatabaseHas('episodes', ['episode_number' => 1]);
    }
}