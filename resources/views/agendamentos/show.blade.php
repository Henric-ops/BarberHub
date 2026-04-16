@extends('layouts.app')

@section('content')
    <div class="max-w-3xl mx-auto rounded-lg border border-slate-200 bg-white p-6 shadow-sm">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h1 class="text-2xl font-semibold">Agendamento</h1>
                <p class="text-sm text-slate-600">Veja os detalhes completos do agendamento.</p>
            </div>
            <a href="{{ route('agendamentos.index') }}" class="rounded bg-slate-800 px-4 py-2 text-white">Voltar</a>
        </div>

        <div class="space-y-4 text-slate-700">
            <p><strong>Cliente:</strong> {{ $agendamento->cliente->nome }}</p>
            <p><strong>Barbeiro:</strong> {{ $agendamento->barbeiro->name }}</p>
            <p><strong>Serviço:</strong> {{ $agendamento->servico->nome }}</p>
            <p><strong>Início:</strong> {{ $agendamento->data_hora_inicio->format('d/m/Y H:i') }}</p>
            <p><strong>Fim:</strong> {{ $agendamento->data_hora_fim->format('d/m/Y H:i') }}</p>
            <p><strong>Status:</strong> {{ $agendamento->status ?? 'agendado' }}</p>
        </div>
    </div>
@endsection
