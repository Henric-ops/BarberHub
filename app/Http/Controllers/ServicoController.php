<?php

namespace App\Http\Controllers;

use App\Models\Servico;
use App\Http\Requests\StoreServicoRequest;
use App\Http\Requests\UpdateServicoRequest;
use Illuminate\Http\Request;

class ServicoController extends Controller
{
    public function index(Request $request)
    {
        $query = Servico::query();

        if ($request->filled('search')) {
            $query->where('nome', 'like', '%' . $request->search . '%')
                ->orWhere('descricao', 'like', '%' . $request->search . '%');
        }

        $servicos = $query->get();
        return view('servicos.index', compact('servicos'));
    }

    public function create()
    {
        return view('servicos.create');
    }

    public function store(StoreServicoRequest $request)
    {
        Servico::create($request->validated());
        return redirect()->route('servicos.index')->with('success', 'Serviço criado com sucesso.');
    }

    public function show(Servico $servico)
    {
        return view('servicos.show', compact('servico'));
    }

    public function edit(Servico $servico)
    {
        return view('servicos.edit', compact('servico'));
    }

    public function update(UpdateServicoRequest $request, Servico $servico)
    {
        $servico->update($request->validated());
        return redirect()->route('servicos.index')->with('success', 'Serviço atualizado com sucesso.');
    }

    public function destroy(Servico $servico)
    {
        $servico->delete();
        return redirect()->route('servicos.index')->with('success', 'Serviço deletado com sucesso.');
    }
}
