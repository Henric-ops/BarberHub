@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto rounded-lg border border-slate-200 bg-white p-6 shadow-sm">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h1 class="text-2xl font-semibold">Editar Cliente</h1>
                <p class="text-sm text-slate-600">Atualize os dados do cliente.</p>
            </div>
            <a href="{{ route('clientes.index') }}" class="rounded bg-slate-800 px-4 py-2 text-white">Voltar</a>
        </div>

        <form method="POST" action="{{ route('clientes.update', $cliente) }}" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-medium text-slate-700">Nome</label>
                <input type="text" name="nome" value="{{ old('nome', $cliente->nome) }}" required
                    class="mt-1 block w-full rounded border border-slate-300 px-4 py-2 focus:border-slate-500 focus:ring-slate-500">
            </div>

            <div class="grid gap-4 sm:grid-cols-2">
                <div>
                    <label class="block text-sm font-medium text-slate-700">Telefone</label>
                    <input type="text" name="telefone" value="{{ old('telefone', $cliente->telefone) }}" required
                        class="mt-1 block w-full rounded border border-slate-300 px-4 py-2 focus:border-slate-500 focus:ring-slate-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700">CPF</label>
                    <input type="text" name="cpf" value="{{ old('cpf', $cliente->cpf) }}" required
                        class="mt-1 block w-full rounded border border-slate-300 px-4 py-2 focus:border-slate-500 focus:ring-slate-500">
                </div>
            </div>

            <div class="grid gap-4 sm:grid-cols-2">
                <div>
                    <label class="block text-sm font-medium text-slate-700">E-mail</label>
                    <input type="email" name="email" value="{{ old('email', $cliente->email) }}"
                        class="mt-1 block w-full rounded border border-slate-300 px-4 py-2 focus:border-slate-500 focus:ring-slate-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700">Endereço</label>
                    <input type="text" name="endereco" value="{{ old('endereco', $cliente->endereco) }}"
                        class="mt-1 block w-full rounded border border-slate-300 px-4 py-2 focus:border-slate-500 focus:ring-slate-500">
                </div>
            </div>

            <button type="submit" class="rounded bg-[#1b1b18] px-4 py-2 text-white">Salvar cliente</button>
        </form>
    </div>
@endsection
