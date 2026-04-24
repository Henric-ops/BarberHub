@extends('layouts.app')

@section('content')
<div class="container">

    <h2 class="mb-4">
        <i class="fas fa-chart-bar"></i> Relatórios
    </h2>

    <div class="row">

        <!-- Relatório Agendamentos -->
        <div class="col-md-6">
            <a href="{{ route('relatorio.agendamentos') }}" class="text-decoration-none">
                <div class="card shadow-sm hover-shadow">
                    <div class="card-body text-center">
                        <i class="fas fa-calendar-alt fa-2x mb-2 text-primary"></i>
                        <h5>Relatório de Agendamentos</h5>
                        <p class="text-muted">Visualize todos os agendamentos do sistema</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Relatório Serviços -->
        <div class="col-md-6">
            <a href="{{ route('relatorio.servicos') }}" class="text-decoration-none">
                <div class="card shadow-sm hover-shadow">
                    <div class="card-body text-center">
                        <i class="fas fa-cut fa-2x mb-2 text-success"></i>
                        <h5>Relatório de Serviços</h5>
                        <p class="text-muted">Análise dos serviços realizados</p>
                    </div>
                </div>
            </a>
        </div>

    </div>
</div>
@endsection