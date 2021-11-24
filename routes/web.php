<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\SeasonsController;
use App\Http\Controllers\EpisodesController;

// Route::resources(['series' => SeriesController::class]);

Route::get('/series', [SeriesController::class, 'index'])->name('series.index');
Route::get('series/create', [SeriesController::class, 'create'])->name('series.create');
Route::post('/series/create', [SeriesController::class, 'store']);
Route::post('series/{id}/edit', [SeriesController::class, 'update']);
Route::delete('series/{id}', [SeriesController::class, 'destroy']);

Route::get('/series/{id}/seasons', [SeasonsController::class, 'index'])->name('seasons.index');

Route::get('/seasons/{seasonId}/episodes', [EpisodesController::class, 'index'])->name('episodes.index');