@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto rounded-lg border border-slate-200 bg-white p-6 shadow-sm">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h1 class="text-2xl font-semibold">Serviço</h1>
                <p class="text-sm text-slate-600">Visualize os detalhes do serviço.</p>
            </div>
            <a href="{{ route('servicos.index') }}" class="rounded bg-slate-800 px-4 py-2 text-white">Voltar</a>
        </div>

        <div class="space-y-4 text-slate-700">
            <p><strong>Nome:</strong> {{ $servico->nome }}</p>
            <p><strong>Descrição:</strong> {{ $servico->descricao }}</p>
            <p><strong>Preço:</strong> R$ {{ number_format($servico->preco, 2, ',', '.') }}</p>
            <p><strong>Duração:</strong> {{ $servico->duracao_minutos }} minutos</p>
        </div>
    </div>
@endsection
