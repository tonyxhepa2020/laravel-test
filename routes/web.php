<?php

use App\Http\Controllers\Admin\AdminCastController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminGenreController;
use App\Http\Controllers\Admin\AdminMovieController;
use App\Http\Controllers\Admin\AdminSeasonController;
use App\Http\Controllers\Admin\AdminSerieController;
use App\Http\Controllers\Admin\AdminTagController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/attach', [TestController::class, 'attach']);

Route::group([
    'middleware' => ['role:admin'],
    'prefix' => 'admin'
], function () {
    Route::get('/', [AdminDashboardController::class,'index'])->name('index');
     Route::get('/movies', [AdminMovieController::class, 'index'])->name('movie');
     Route::get('/series', [AdminSerieController::class, 'index'])->name('serie');
     Route::get('/series/{serie:slug}/seasons', [AdminSeasonController::class, 'index'])->name('season');
     Route::get('/casts', [AdminCastController::class, 'index'])->name('cast');
     Route::get('/genres', [AdminGenreController::class, 'index'])->name('genre');
     Route::get('/tags', [AdminTagController::class, 'index'])->name('tag');
});
   