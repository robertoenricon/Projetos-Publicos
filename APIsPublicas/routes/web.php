<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SabespController;

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/sabesp', function () {
    return view('sabesp');
})->name('sabesp');

// Rota para obter o resumo diário dos Mananciais da Sabesp
Route::get('/api/sabesp/{date}', [SabespController::class, 'showDailySummary']);