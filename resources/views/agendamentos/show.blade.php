@extends('layouts.app')

@section('content')
    <div class="container-fluid py-4">
        <div class="panel p-4 shadow-sm mx-auto" style="max-width: 46rem;">
            <div class="d-flex flex-column flex-md-row align-items-start align-items-md-center justify-content-between gap-3 mb-4">
                <div>
                    <h1 class="h3 mb-1">Agendamento</h1>
                    <p class="text-muted mb-0">Veja os detalhes completos do agendamento.</p>
                </div>
                <a href="{{ route('agendamentos.index') }}" class="btn btn-outline-secondary">Voltar</a>
            </div>

            <div class="row g-3 text-dark">
                <div class="col-md-6"><strong>Cliente:</strong> {{ $agendamento->cliente->nome }}</div>
                <div class="col-md-6"><strong>Barbeiro:</strong> {{ $agendamento->barbeiro->name }}</div>
                <div class="col-md-6"><strong>Serviço:</strong> {{ $agendamento->servico->nome }}</div>
                <div class="col-md-6"><strong>Início:</strong> {{ $agendamento->data_hora_inicio->format('d/m/Y H:i') }}</div>
                <div class="col-md-6"><strong>Fim:</strong> {{ $agendamento->data_hora_fim->format('d/m/Y H:i') }}</div>
                <div class="col-md-6"><strong>Status:</strong> {{ ucfirst($agendamento->status ?? 'agendado') }}</div>
            </div>
        </div>
    </div>
@endsection
