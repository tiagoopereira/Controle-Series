<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeriesController;

// Route::resources(['series' => SeriesController::class]);

Route::get('/series', [SeriesController::class, 'index'])->name('series.index');
Route::get('series/create', [SeriesController::class, 'create'])->name('series.create');
Route::post('/series/create', [SeriesController::class, 'store']);
Route::delete('series/{id}', [SeriesController::class, 'destroy']);