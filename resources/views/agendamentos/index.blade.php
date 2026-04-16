@extends('layouts.app')

@section('content')
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between mb-6">
        <div>
            <h1 class="text-2xl font-semibold">Agendamentos</h1>
            <p class="text-sm text-slate-600">Gerencie a agenda de clientes e barbeiros.</p>
        </div>
        @if(auth()->user()->isAdministrador())
            <a href="{{ route('agendamentos.create') }}" class="inline-flex items-center rounded bg-[#1b1b18] px-4 py-2 text-white hover:bg-slate-900">Novo Agendamento</a>
        @endif
    </div>

    <form method="GET" class="mb-6">
        <input type="search" name="search" value="{{ request('search') }}" placeholder="Buscar por cliente ou barbeiro"
            class="w-full rounded border border-slate-300 px-4 py-2 focus:border-slate-500 focus:ring-slate-500">
    </form>

    <div class="overflow-x-auto rounded-lg border border-slate-200 bg-white shadow-sm">
        <table class="min-w-full text-left text-sm text-slate-700">
            <thead class="bg-slate-50 uppercase text-slate-500">
                <tr>
                    <th class="px-4 py-3">Cliente</th>
                    <th class="px-4 py-3">Barbeiro</th>
                    <th class="px-4 py-3">Serviço</th>
                    <th class="px-4 py-3">Início</th>
                    <th class="px-4 py-3">Fim</th>
                    <th class="px-4 py-3">Status</th>
                    <th class="px-4 py-3">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($agendamentos as $agendamento)
                    <tr class="border-t border-slate-200">
                        <td class="px-4 py-3">{{ $agendamento->cliente->nome }}</td>
                        <td class="px-4 py-3">{{ $agendamento->barbeiro->name }}</td>
                        <td class="px-4 py-3">{{ $agendamento->servico->nome }}</td>
                        <td class="px-4 py-3">{{ $agendamento->data_hora_inicio->format('d/m/Y H:i') }}</td>
                        <td class="px-4 py-3">{{ $agendamento->data_hora_fim->format('d/m/Y H:i') }}</td>
                        <td class="px-4 py-3 capitalize">{{ $agendamento->status ?? 'agendado' }}</td>
                        <td class="px-4 py-3 space-x-2">
                            <a href="{{ route('agendamentos.edit', $agendamento) }}" class="rounded bg-slate-800 px-3 py-1 text-white text-sm">Editar</a>
                            @if(auth()->user()->isAdministrador())
                                <form action="{{ route('agendamentos.destroy', $agendamento) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="rounded bg-red-600 px-3 py-1 text-white text-sm">Excluir</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-4 py-6 text-center text-slate-500">Nenhum agendamento encontrado.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
