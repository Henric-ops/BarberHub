<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\AgendamentoController;
use App\Http\Controllers\ServicoController;
use App\Http\Controllers\BarbeiroController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RelatorioAgendamentosController;
use App\Http\Controllers\RelatorioServicosController;
use App\Models\Agendamento;
use App\Models\Cliente;
use App\Models\Servico;
use App\Models\User;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

Route::middleware('auth')->group(function () {
    // Dashboard do administrador (protegido)
    Route::middleware('only.admin')->group(function () {
        Route::get('dashboard', function () {
            $data = [
                'clientesCount' => Cliente::count(),
                'servicosCount' => Servico::count(),
                'agendamentosCount' => Agendamento::count(),
                'barbeirosCount' => User::where('cargo', 'barbeiro')->count(),
            ];
            return view('dashboard', $data);
        })->name('dashboard');

        Route::get('/relatorio/agendamentos', [RelatorioAgendamentosController::class, 'relatorioAgendamentos'])->name('relatorio.agendamentos');
        Route::get('/relatorio/servicos', [RelatorioServicosController::class, 'relatorioServicos'])->name('relatorio.servicos');

    });

    // Dashboard do barbeiro (protegido)
    Route::middleware('only.barbeiro')->group(function () {
        Route::get('barbeiro/dashboard', function () {
            $data = [
                'agendamentosCount' => auth()->user()->agendamentos()->count(),
            ];
            return view('barbeiro.dashboard', $data);
        })->name('barbeiro.dashboard');
    });

    // Rotas disponíveis para todos (mas dados filtrados por cargo)
    Route::resource('clientes', ClienteController::class);
    Route::resource('servicos', ServicoController::class);
    Route::resource('barbeiros', BarbeiroController::class);
    Route::resource('agendamentos', AgendamentoController::class);
});