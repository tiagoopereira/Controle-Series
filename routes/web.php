<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeriesController;

// Route::get('/series', [SeriesController::class, 'list']);

Route::resources(['series' => SeriesController::class]);
Route::post('/series/create', [SeriesController::class, 'store']);