<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\SeasonsController;
use App\Http\Controllers\EpisodesController;
use App\Http\Controllers\RegisterController;

// Login routes
Route::get('/login', [LoginController::class, 'index'])->name('login.index');
Route::post('/login', [LoginController::class, 'login'])->name('login.login');

// Logout routes
Route::get('/logout', function () {
    Auth::logout();
    return redirect()->route('login.index');
})->name('logout');

// Register routes
Route::get('/register', [RegisterController::class, 'create'])->name('register.create');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

// Redirect '/' to '/series'
Route::get('/', function () {
    return redirect()->route('series.index');
});

// Series routes
Route::get('/series', [SeriesController::class, 'index'])->name('series.index');
Route::get('series/create', [SeriesController::class, 'create'])->name('series.create')->middleware('auth');
Route::post('/series/create', [SeriesController::class, 'store'])->middleware('auth');
Route::post('series/{id}/edit', [SeriesController::class, 'update'])->middleware('auth');
Route::delete('series/{id}', [SeriesController::class, 'destroy'])->middleware('auth');

// Seasons routes
Route::get('/series/{id}/seasons', [SeasonsController::class, 'index'])->name('seasons.index');

// Episodes routes
Route::get('/seasons/{seasonId}/episodes', [EpisodesController::class, 'index'])->name('episodes.index');
Route::post('/seasons/{seasonId}/episodes/watch', [EpisodesController::class, 'watch'])->name('episodes.watch');