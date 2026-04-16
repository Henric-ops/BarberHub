<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\AgendamentoController;
use App\Http\Controllers\ServicoController;
use App\Http\Controllers\AuthController;
use App\Models\Agendamento;
use App\Models\Cliente;
use App\Models\Servico;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('dashboard', function () {
        return view('dashboard', [
            'clientesCount' => Cliente::count(),
            'servicosCount' => Servico::count(),
            'agendamentosCount' => Agendamento::count(),
        ]);
    })->name('dashboard');

    Route::resource('clientes', ClienteController::class);
    Route::resource('servicos', ServicoController::class);
    Route::resource('agendamentos', AgendamentoController::class);
});