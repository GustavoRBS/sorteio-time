<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\Sortition\GameController;
use App\Http\Controllers\Sortition\PlayersController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('players.new');
});

Route::get('/game/new/players', [PlayersController::class, 'newPlayers'])->name('players.new');
Route::post('/game/new/players', [PlayersController::class, 'sendPlayers'])->name('players.send.new');

Route::get('/game/new/', [GameController::class, 'newGame'])->name('game.new');
Route::post('/game/new/', [GameController::class, 'sendGame'])->name('game.send.new');
Route::get('/game/new/result', [GameController::class, 'resultGame'])->name('result.new');

Route::post('/delete', [Controller::class, 'delete'])->name('delete');
