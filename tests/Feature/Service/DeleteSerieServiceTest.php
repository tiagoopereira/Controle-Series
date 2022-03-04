<?php

namespace App\Services;

use App\Models\Serie;
use Tests\TestCase;
use App\Services\DeleteSerieService;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DeleteSerieServiceTest extends TestCase
{
    use RefreshDatabase;

    private DeleteSerieService $service;
    private Serie $serie;

    protected function setUp(): void
    {
        parent::setUp();

        $this->service = new DeleteSerieService();
        $createSerieService = new CreateSerieService();
        $this->serie = $createSerieService->create('How I Met Your Mother', 9, 24);
    }

    public function testDeleteSerie(): void
    {
        $this->assertDatabaseHas('series', ['id' => $this->serie->id]);

        $this->service->delete($this->serie->id);

        $this->assertDatabaseMissing('series', ['id' => $this->serie->id]);
        $this->assertDatabaseMissing('seasons', ['serie_id' => $this->serie->id]);
        $this->assertDatabaseCount('episodes', 0);
    }
}