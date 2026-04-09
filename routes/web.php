<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\AgendamentoController;
use App\Http\Controllers\ServicoController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('clientes', ClienteController::class);
Route::resource('agendamentos', AgendamentoController::class);
Route::resource('servicos', ServicoController::class);