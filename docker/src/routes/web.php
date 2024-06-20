<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompetitionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ParticipantsController;
use App\Http\Controllers\RoundParticipantController;
use App\Http\Controllers\RoundController;

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


Route::delete('/competitions/{id}', [CompetitionController::class, 'destroy'])->name('competitions.destroy');
Route::delete('/rounds/{id}', [RoundController::class, 'destroy'])->name('round.destroy');
Route::delete('/rounds/{round_id}/participants/{participant_id}', [RoundParticipantController::class, 'destroy'])->name('round.participant.destroy');


