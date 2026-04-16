@extends('layouts.app')

@section('content')
    <div class="container-fluid py-4">
        <div class="panel p-4 shadow-sm mx-auto" style="max-width: 42rem;">
            <div class="d-flex flex-column flex-md-row align-items-start align-items-md-center justify-content-between gap-3 mb-4">
                <div>
                    <h1 class="h3 mb-1">Serviço</h1>
                    <p class="text-muted mb-0">Visualize os detalhes do serviço.</p>
                </div>
                <a href="{{ route('servicos.index') }}" class="btn btn-outline-secondary">Voltar</a>
            </div>

            <div class="row g-3 text-dark">
                <div class="col-12"><strong>Nome:</strong> {{ $servico->nome }}</div>
                <div class="col-12"><strong>Descrição:</strong> {{ $servico->descricao }}</div>
                <div class="col-md-6"><strong>Preço:</strong> R$ {{ number_format($servico->preco, 2, ',', '.') }}</div>
                <div class="col-md-6"><strong>Duração:</strong> {{ $servico->duracao_minutos }} minutos</div>
            </div>
        </div>
    </div>
@endsection
