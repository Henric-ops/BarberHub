@extends('layouts.app')

@section('content')
<div class="row g-4 fade-in">

    {{-- HEADER --}}
    <div class="col-12">
        <div class="page-header d-flex flex-column flex-md-row align-items-start align-items-md-center justify-content-between gap-3">
            
            <div>
                <h2 class="page-title mb-1 d-flex align-items-center gap-2">
                    <i class="fas fa-chart-line text-primary"></i>
                    Olá, {{ auth()->user()->name }}
                </h2>
                <p class="page-description mb-0">
                    Visão geral da sua barbearia com métricas e ações rápidas.
                </p>
            </div>

            <div class="d-flex flex-wrap gap-2">
                <a href="{{ route('agendamentos.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i> Novo agendamento
                </a>
                <a href="{{ route('clientes.index') }}" class="btn btn-outline-primary">
                    <i class="fas fa-users me-2"></i> Clientes
                </a>
            </div>
        </div>
    </div>

    {{-- HERO --}}
    <div class="col-12 col-xl-7">
        <div class="panel panel-hero p-5">
            
            <span class="badge bg-white text-primary rounded-pill mb-3">
                <i class="fas fa-star me-1"></i> Painel
            </span>

            <h1 class="text-white mb-3">
                Gestão inteligente da sua barbearia
            </h1>

            <p class="text-white-75 mb-4">
                Controle total de agendamentos, clientes e serviços com uma experiência moderna.
            </p>

            <div class="row g-3">
                <div class="col-6">
                    <div class="rounded-4 bg-white bg-opacity-15 p-3 d-flex align-items-center gap-3">
                        <i class="fas fa-calendar text-white"></i>
                        <div>
                            <p class="text-white-75 mb-0 small">Agendamentos</p>
                            <h3 class="text-white mb-0">{{ $agendamentosCount }}</h3>
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="rounded-4 bg-white bg-opacity-15 p-3 d-flex align-items-center gap-3">
                        <i class="fas fa-user text-white"></i>
                        <div>
                            <p class="text-white-75 mb-0 small">Clientes</p>
                            <h3 class="text-white mb-0">{{ $clientesCount }}</h3>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    {{-- CARDS RÁPIDOS --}}
    <div class="col-12 col-xl-5">
        <div class="row g-4">

            <div class="col-12 col-sm-4">
                <div class="panel p-4 text-center">
                    <i class="fas fa-calendar fa-lg text-primary mb-2"></i>
                    <p class="text-uppercase text-muted small mb-1">Agenda</p>
                    <h3 class="mb-0">{{ $agendamentosCount }}</h3>
                </div>
            </div>

            <div class="col-12 col-sm-4">
                <div class="panel p-4 text-center">
                    <i class="fas fa-users fa-lg text-primary mb-2"></i>
                    <p class="text-uppercase text-muted small mb-1">Clientes</p>
                    <h3 class="mb-0">{{ $clientesCount }}</h3>
                </div>
            </div>

            <div class="col-12 col-sm-4">
                <div class="panel p-4 text-center">
                    <i class="fas fa-scissors fa-lg text-primary mb-2"></i>
                    <p class="text-uppercase text-muted small mb-1">Serviços</p>
                    <h3 class="mb-0">{{ $servicosCount }}</h3>
                </div>
            </div>

        </div>
    </div>

    {{-- MÉTRICAS --}}
    <div class="col-12 col-lg-7">
        <div class="panel p-4">

            <div class="d-flex align-items-center justify-content-between mb-4">
                <div>
                    <h3 class="h5 mb-1">
                        <i class="fas fa-chart-pie me-2 text-primary"></i>
                        Visão geral
                    </h3>
                    <p class="text-muted mb-0">Indicadores principais</p>
                </div>
                <span class="badge bg-secondary px-3 py-2">Atual</span>
            </div>

            <div class="row g-3">

                <div class="col-6">
                    <div class="rounded-4 border p-3">
                        <p class="text-muted mb-1 small">Agenda ativa</p>
                        <h4 class="mb-1">8</h4>
                        <span class="text-success">
                            <i class="fas fa-arrow-up"></i> +12%
                        </span>
                    </div>
                </div>

                <div class="col-6">
                    <div class="rounded-4 border p-3">
                        <p class="text-muted mb-1 small">Faturamento</p>
                        <h4 class="mb-1">R$ 1.717</h4>
                        <span class="text-success">
                            <i class="fas fa-arrow-up"></i> +7%
                        </span>
                    </div>
                </div>

                <div class="col-6">
                    <div class="rounded-4 border p-3">
                        <p class="text-muted mb-1 small">Capacidade</p>
                        <h4 class="mb-1">Alta</h4>
                        <span class="text-success">Operando bem</span>
                    </div>
                </div>

                <div class="col-6">
                    <div class="rounded-4 border p-3">
                        <p class="text-muted mb-1 small">Pendências</p>
                        <h4 class="mb-1">3</h4>
                        <span class="text-danger">
                            <i class="fas fa-exclamation-circle"></i> Atenção
                        </span>
                    </div>
                </div>

            </div>
        </div>
    </div>

    {{-- AÇÕES --}}
    <div class="col-12 col-lg-5">
        <div class="panel p-4 h-100">

            <h3 class="h5 mb-3">
                <i class="fas fa-bolt me-2 text-primary"></i>
                Ações rápidas
            </h3>

            <ul class="list-group list-group-flush">

                <li class="list-group-item d-flex align-items-center justify-content-between gap-3 p-3 rounded-4 mb-2">
                    <div class="d-flex align-items-center gap-3">
                        <i class="fas fa-user-plus text-primary"></i>
                        <div>
                            <p class="mb-1 text-muted small">Clientes novos</p>
                            <strong>4 cadastros</strong>
                        </div>
                    </div>
                    <span class="badge bg-secondary rounded-pill">Hoje</span>
                </li>

                <li class="list-group-item d-flex align-items-center justify-content-between gap-3 p-3 rounded-4 mb-2">
                    <div class="d-flex align-items-center gap-3">
                        <i class="fas fa-scissors text-primary"></i>
                        <div>
                            <p class="mb-1 text-muted small">Serviços</p>
                            <strong>2 adicionados</strong>
                        </div>
                    </div>
                    <span class="badge bg-secondary rounded-pill">Semana</span>
                </li>

                <li class="list-group-item d-flex align-items-center justify-content-between gap-3 p-3 rounded-4">
                    <div class="d-flex align-items-center gap-3">
                        <i class="fas fa-exclamation-triangle text-danger"></i>
                        <div>
                            <p class="mb-1 text-muted small">Confirmação</p>
                            <strong>1 pendente</strong>
                        </div>
                    </div>
                    <span class="badge bg-danger rounded-pill">Urgente</span>
                </li>

            </ul>

        </div>
    </div>

</div>
@endsection