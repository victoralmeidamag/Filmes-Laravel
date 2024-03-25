<?php

use App\Http\Controllers\FilmesController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FilmesController::class, 'index'])->name('filmes.index');
Route::get('/filmes/{filme}', [FilmesController::class, 'show'])->name('filmes.show');
