@extends('layouts.app')

@section('content')
    <div class="container-fluid py-4">
        <div class="card rounded-lg shadow-md" style="max-width: 600px; margin: 0 auto;">
            <div class="p-4 border-bottom" style="background: linear-gradient(135deg, #F97316 0%, #FB923C 100%); color: #fff;">
                <div class="d-flex justify-content-between align-items-center">
                    <h2 class="h3 mb-0 d-flex align-items-center gap-2" style="color: #fff;">
                        <i class="fas fa-scissors"></i>
                        Detalhes do Serviço
                    </h2>
                    <a href="{{ route('servicos.index') }}" class="btn btn-outline-light btn-sm">
                        <i class="fas fa-arrow-left"></i> Voltar
                    </a>
                </div>
            </div>

            <div class="p-4 p-md-5">
                <div class="row g-4">
                    <div class="col-12">
                        <small class="text-muted d-block mb-1">Nome</small>
                        <div class="fw-semibold">{{ $servico->nome }}</div>
                    </div>
                    <div class="col-12">
                        <small class="text-muted d-block mb-1">Descrição</small>
                        <div>{{ $servico->descricao }}</div>
                    </div>
                    <div class="col-md-6">
                        <small class="text-muted d-block mb-1">Preço</small>
                        <div class="fw-semibold">R$ {{ number_format($servico->preco, 2, ',', '.') }}</div>
                    </div>
                    <div class="col-md-6">
                        <small class="text-muted d-block mb-1">Duração</small>
                        <div>{{ $servico->duracao_minutos }} minutos</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
