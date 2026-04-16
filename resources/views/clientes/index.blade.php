@extends('layouts.app')

@section('content')
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between mb-6">
        <div>
            <h1 class="text-2xl font-semibold">Clientes</h1>
            <p class="text-sm text-slate-600">Gerencie os cadastros de clientes e filtre por nome ou telefone.</p>
        </div>
        <a href="{{ route('clientes.create') }}" class="inline-flex items-center rounded bg-[#1b1b18] px-4 py-2 text-white hover:bg-slate-900">Novo Cliente</a>
    </div>

    <form method="GET" class="mb-6">
        <label class="sr-only">Buscar</label>
        <input type="search" name="search" value="{{ request('search') }}" placeholder="Buscar por nome ou telefone"
            class="w-full rounded border border-slate-300 px-4 py-2 focus:border-slate-500 focus:ring-slate-500">
    </form>

    <div class="overflow-x-auto rounded-lg border border-slate-200 bg-white shadow-sm">
        <table class="min-w-full text-left text-sm text-slate-700">
            <thead class="bg-slate-50 uppercase text-slate-500">
                <tr>
                    <th class="px-4 py-3">Nome</th>
                    <th class="px-4 py-3">Telefone</th>
                    <th class="px-4 py-3">CPF</th>
                    <th class="px-4 py-3">E-mail</th>
                    <th class="px-4 py-3">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($clientes as $cliente)
                    <tr class="border-t border-slate-200">
                        <td class="px-4 py-3">{{ $cliente->nome }}</td>
                        <td class="px-4 py-3">{{ $cliente->telefone }}</td>
                        <td class="px-4 py-3">{{ $cliente->cpf }}</td>
                        <td class="px-4 py-3">{{ $cliente->email }}</td>
                        <td class="px-4 py-3 space-x-2">
                            <a href="{{ route('clientes.edit', $cliente) }}" class="rounded bg-slate-800 px-3 py-1 text-white text-sm">Editar</a>
                            <form action="{{ route('clientes.destroy', $cliente) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="rounded bg-red-600 px-3 py-1 text-white text-sm">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-4 py-6 text-center text-slate-500">Nenhum cliente encontrado.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
