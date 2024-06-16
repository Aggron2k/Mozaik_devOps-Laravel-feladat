<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompetitionController;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Auth::routes();

// Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post('/competitions', [CompetitionController::class, 'store'])->name('competition.store');
