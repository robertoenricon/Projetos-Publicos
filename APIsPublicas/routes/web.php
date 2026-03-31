<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SabespController;

Route::get('/', function () {
    return view('index');
});

// Rota para obter o resumo diário dos Mananciais da Sabesp
Route::get('/api/sabesp/{date}', [SabespController::class, 'showDailySummary'])
    ->where('date', '^\d{4}-\d{2}-\d{2}$')
    ->name('api.sabesp.daily');