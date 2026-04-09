<?php

namespace App\Http\Controllers;

use App\Models\Agendamento;
use App\Http\Requests\StoreAgendamentoRequest;
use App\Http\Requests\UpdateAgendamentoRequest;

class AgendamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $agendamentos = Agendamento::with('cliente', 'servico', 'barbeiro')->get();
        return view('agendamentos.index', compact('agendamentos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clientes = Cliente::all();
        $servicos = Servico::all();
        $barbeiros = User::where('cargo', 'barbeiro')->get();
        return view('agendamentos.create', compact('clientes', 'servicos', 'barbeiros'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAgendamentoRequest $request)
    {
        Agendamento::create($request->validated());
        return redirect()->route('agendamentos.index')->with('success', 'Agendamento criado com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Agendamento $agendamento)
    {
        $agendamento->load('cliente', 'servico', 'barbeiro');
        return view('agendamentos.show', compact('agendamento'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Agendamento $agendamento)
    {
        $clientes = Cliente::all();
        $servicos = Servico::all();
        $barbeiros = User::where('cargo', 'barbeiro')->get();
        return view('agendamentos.edit', compact('agendamento', 'clientes', 'servicos', 'barbeiros'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAgendamentoRequest $request, Agendamento $agendamento)
    {
        $agendamento->update($request->validated());
        return redirect()->route('agendamentos.index')->with('success', 'Agendamento atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Agendamento $agendamento)
    {
        $agendamento->delete();
        return redirect()->route('agendamentos.index')->with('success', 'Agendamento deletado com sucesso.');
    }
}
