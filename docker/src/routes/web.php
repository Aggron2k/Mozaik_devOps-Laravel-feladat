<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompetitionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ParticipantsController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Auth::routes();

// Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post('/competitions', [CompetitionController::class, 'store'])
    ->name('competition.store')
    ->middleware('auth');




Route::get('participants', [ParticipantsController::class, 'index'])
    ->name('participants.index')
    ->middleware('auth');

Route::post('/participants', [ParticipantsController::class, 'store']);

Route::delete('/participants/{id}', [App\Http\Controllers\ParticipantsController::class, 'destroy']);
