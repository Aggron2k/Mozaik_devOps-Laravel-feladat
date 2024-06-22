<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompetitionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ParticipantsController;
use App\Http\Controllers\RoundParticipantController;
use App\Http\Controllers\RoundController;
use App\Http\Controllers\ParticipantController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Auth::routes();

// Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post('/competitions', [CompetitionController::class, 'store'])
    ->name('competition.store')
    ->middleware('auth');
Route::delete('/competitions/{id}', [CompetitionController::class, 'destroy'])->name('competitions.destroy');



Route::get('participants', [ParticipantsController::class, 'index'])
    ->name('participants.index')
    ->middleware('auth');

Route::post('/participants', [ParticipantsController::class, 'store']);
Route::delete('/participants/{id}', [App\Http\Controllers\ParticipantsController::class, 'destroy']);



Route::post('/rounds', [RoundController::class, 'store'])->name('round.store');
Route::delete('/rounds/{id}', [RoundController::class, 'destroy'])->name('round.destroy');

Route::delete('/rounds/{round_id}/participants/{participant_id}', [RoundParticipantController::class, 'destroy'])->name('round.participant.destroy');

Route::get('/participants/{roundId}', [ParticipantsController::class, 'getList']);
Route::post('/add_participant_to_round', [RoundParticipantController::class, 'store']);





