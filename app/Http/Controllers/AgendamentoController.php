<?php

namespace App\Http\Controllers;

use App\Models\Agendamento;
use App\Models\Cliente;
use App\Models\Servico;
use App\Models\User;
use App\Http\Requests\StoreAgendamentoRequest;
use App\Http\Requests\UpdateAgendamentoRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AgendamentoController extends Controller
{
    public function index(Request $request)
    {
        $query = Agendamento::with('cliente', 'servico', 'barbeiro');

        if (Auth::user()->isBarbeiro()) {
            $query->where('barbeiro_id', Auth::id());
        }

        if ($request->filled('search')) {
            $term = '%' . $request->search . '%';
            $query->where(function ($query) use ($term) {
                $query->whereHas('cliente', fn ($q) => $q->where('nome', 'like', $term))
                    ->orWhereHas('barbeiro', fn ($q) => $q->where('name', 'like', $term));
            });
        }

        $agendamentos = $query->get();
        return view('agendamentos.index', compact('agendamentos'));
    }

    public function create()
    {
        abort_unless(Auth::user()->isAdministrador(), 403);

        $clientes = Cliente::all();
        $servicos = Servico::all();
        $barbeiros = User::where('cargo', 'barbeiro')->get();
        return view('agendamentos.create', compact('clientes', 'servicos', 'barbeiros'));
    }

    public function store(StoreAgendamentoRequest $request)
    {
        abort_unless(Auth::user()->isAdministrador(), 403);

        Agendamento::create($request->validated());
        return redirect()->route('agendamentos.index')->with('success', 'Agendamento criado com sucesso.');
    }

    public function show(Agendamento $agendamento)
    {
        abort_unless(
            Auth::user()->isAdministrador() || Auth::id() === $agendamento->barbeiro_id,
            403
        );

        $agendamento->load('cliente', 'servico', 'barbeiro');
        return view('agendamentos.show', compact('agendamento'));
    }

    public function edit(Agendamento $agendamento)
    {
        if (Auth::user()->isAdministrador()) {
            $clientes = Cliente::all();
            $servicos = Servico::all();
            $barbeiros = User::where('cargo', 'barbeiro')->get();
            return view('agendamentos.edit', compact('agendamento', 'clientes', 'servicos', 'barbeiros'));
        }

        abort_unless(Auth::id() === $agendamento->barbeiro_id, 403);
        return view('agendamentos.edit', compact('agendamento'));
    }

    public function update(UpdateAgendamentoRequest $request, Agendamento $agendamento)
    {
        if (Auth::user()->isAdministrador()) {
            $agendamento->update($request->validated());
            return redirect()->route('agendamentos.index')->with('success', 'Agendamento atualizado com sucesso.');
        }

        abort_unless(Auth::id() === $agendamento->barbeiro_id, 403);
        $validated = $request->validate([
            'status' => 'required|in:agendado,concluido,cancelado',
        ]);

        $agendamento->update($validated);
        return redirect()->route('agendamentos.index')->with('success', 'Status do agendamento atualizado.');
    }

    public function destroy(Agendamento $agendamento)
    {
        abort_unless(Auth::user()->isAdministrador(), 403);

        $agendamento->delete();
        return redirect()->route('agendamentos.index')->with('success', 'Agendamento deletado com sucesso.');
    }
}