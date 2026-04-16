@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto rounded-lg border border-slate-200 bg-white p-6 shadow-sm">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h1 class="text-2xl font-semibold">Novo Serviço</h1>
                <p class="text-sm text-slate-600">Cadastre um novo serviço para venda na barbearia.</p>
            </div>
            <a href="{{ route('servicos.index') }}" class="rounded bg-slate-800 px-4 py-2 text-white">Voltar</a>
        </div>

        <form method="POST" action="{{ route('servicos.store') }}" class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-medium text-slate-700">Nome</label>
                <input type="text" name="nome" value="{{ old('nome') }}" required
                    class="mt-1 block w-full rounded border border-slate-300 px-4 py-2 focus:border-slate-500 focus:ring-slate-500">
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700">Descrição</label>
                <textarea name="descricao" rows="3"
                    class="mt-1 block w-full rounded border border-slate-300 px-4 py-2 focus:border-slate-500 focus:ring-slate-500">{{ old('descricao') }}</textarea>
            </div>

            <div class="grid gap-4 sm:grid-cols-2">
                <div>
                    <label class="block text-sm font-medium text-slate-700">Preço</label>
                    <input type="number" step="0.01" name="preco" value="{{ old('preco') }}" required
                        class="mt-1 block w-full rounded border border-slate-300 px-4 py-2 focus:border-slate-500 focus:ring-slate-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700">Duração (minutos)</label>
                    <input type="number" name="duracao_minutos" value="{{ old('duracao_minutos') }}" required
                        class="mt-1 block w-full rounded border border-slate-300 px-4 py-2 focus:border-slate-500 focus:ring-slate-500">
                </div>
            </div>

            <button type="submit" class="rounded bg-[#1b1b18] px-4 py-2 text-white">Salvar serviço</button>
        </form>
    </div>
@endsection
