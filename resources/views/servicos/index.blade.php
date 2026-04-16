@extends('layouts.app')

@section('content')
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between mb-6">
        <div>
            <h1 class="text-2xl font-semibold">Serviços</h1>
            <p class="text-sm text-slate-600">Cadastre, edite e remova serviços oferecidos pela barbearia.</p>
        </div>
        <a href="{{ route('servicos.create') }}" class="inline-flex items-center rounded bg-[#1b1b18] px-4 py-2 text-white hover:bg-slate-900">Novo Serviço</a>
    </div>

    <form method="GET" class="mb-6">
        <input type="search" name="search" value="{{ request('search') }}" placeholder="Buscar por nome ou descrição"
            class="w-full rounded border border-slate-300 px-4 py-2 focus:border-slate-500 focus:ring-slate-500">
    </form>

    <div class="overflow-x-auto rounded-lg border border-slate-200 bg-white shadow-sm">
        <table class="min-w-full text-left text-sm text-slate-700">
            <thead class="bg-slate-50 uppercase text-slate-500">
                <tr>
                    <th class="px-4 py-3">Nome</th>
                    <th class="px-4 py-3">Preço</th>
                    <th class="px-4 py-3">Duração (min)</th>
                    <th class="px-4 py-3">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($servicos as $servico)
                    <tr class="border-t border-slate-200">
                        <td class="px-4 py-3">{{ $servico->nome }}</td>
                        <td class="px-4 py-3">R$ {{ number_format($servico->preco, 2, ',', '.') }}</td>
                        <td class="px-4 py-3">{{ $servico->duracao_minutos }}</td>
                        <td class="px-4 py-3 space-x-2">
                            <a href="{{ route('servicos.edit', $servico) }}" class="rounded bg-slate-800 px-3 py-1 text-white text-sm">Editar</a>
                            <form action="{{ route('servicos.destroy', $servico) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="rounded bg-red-600 px-3 py-1 text-white text-sm">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-4 py-6 text-center text-slate-500">Nenhum serviço encontrado.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
