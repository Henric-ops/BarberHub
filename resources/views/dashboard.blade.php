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
                    @if(auth()->user()->isAdministrador())
                        Visão geral da sua barbearia com métricas e ações rápidas.
                    @else
                        Seu painel de agendamentos e informações.
                    @endif
                </p>
            </div>

            <div class="d-flex flex-wrap gap-2">
                @if(auth()->user()->isAdministrador())
                    <a href="{{ route('agendamentos.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Novo agendamento
                    </a>
                    <a href="{{ route('clientes.index') }}" class="btn btn-outline-primary">
                        <i class="fas fa-users"></i> Clientes
                    </a>
                @else
                    <a href="{{ route('agendamentos.index') }}" class="btn btn-primary">
                        <i class="fas fa-calendar"></i> Meus agendamentos
                    </a>
                @endif
            </div>
        </div>
    </div>

    {{-- DASHBOARD ADMINISTRADOR --}}
    @if(auth()->user()->isAdministrador())
    <div class="col-12 col-xl-7">
        <div class="panel panel-hero p-5">
            
            <span class="badge badge-primary mb-3">
                <i class="fas fa-star"></i> Painel
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
                <div class="panel p-4 text-center transition-all">
                    <div class="d-inline-flex align-items-center justify-content-center rounded-lg mb-3" style="width: 50px; height: 50px; background: rgba(37, 99, 235, 0.15);">
                        <i class="fas fa-calendar fa-lg text-primary"></i>
                    </div>
                    <p class="text-uppercase text-muted small mb-1">Agenda</p>
                    <h3 class="mb-0" style="color: var(--color-primary);">{{ $agendamentosCount }}</h3>
                </div>
            </div>

            <div class="col-12 col-sm-4">
                <div class="panel p-4 text-center transition-all">
                    <div class="d-inline-flex align-items-center justify-content-center rounded-lg mb-3" style="width: 50px; height: 50px; background: rgba(5, 150, 105, 0.15);">
                        <i class="fas fa-users fa-lg" style="color: var(--color-secondary);"></i>
                    </div>
                    <p class="text-uppercase text-muted small mb-1">Clientes</p>
                    <h3 class="mb-0" style="color: var(--color-secondary);">{{ $clientesCount }}</h3>
                </div>
            </div>

            <div class="col-12 col-sm-4">
                <div class="panel p-4 text-center transition-all">
                    <div class="d-inline-flex align-items-center justify-content-center rounded-lg mb-3" style="width: 50px; height: 50px; background: rgba(249, 115, 22, 0.15);">
                        <i class="fas fa-scissors fa-lg" style="color: var(--color-warning);"></i>
                    </div>
                    <p class="text-uppercase text-muted small mb-1">Serviços</p>
                    <h3 class="mb-0" style="color: var(--color-warning);">{{ $servicosCount }}</h3>
                </div>
            </div>

            @if(auth()->user()->isAdministrador())
                <div class="col-12 col-sm-4">
                    <div class="panel p-4 text-center transition-all">
                        <div class="d-inline-flex align-items-center justify-content-center rounded-lg mb-3" style="width: 50px; height: 50px; background: rgba(37, 99, 235, 0.15);">
                            <i class="fas fa-user-tie fa-lg text-primary"></i>
                        </div>
                        <p class="text-uppercase text-muted small mb-1">Barbeiros</p>
                        <h3 class="mb-0" style="color: var(--color-primary);">{{ $barbeirosCount ?? 0 }}</h3>
                    </div>
                </div>
            @endif

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

    {{-- FIM DO DASHBOARD ADMINISTRADOR --}}
    @else

    {{-- DASHBOARD BARBEIRO --}}
    <div class="col-12 col-lg-8">
        <div class="panel p-5">
            
            <span class="badge badge-primary mb-3">
                <i class="fas fa-calendar"></i> Meus agendamentos
            </span>

            <h2 class="mb-3">Próximos agendamentos</h2>

            <p class="text-muted mb-4">
                Visualize todos os seus agendamentos programados.
            </p>

            <div class="row g-3">
                <div class="col-12">
                    <div class="rounded-4 border p-4 d-flex align-items-center gap-3">
                        <div class="d-inline-flex align-items-center justify-content-center rounded-lg" style="width: 60px; height: 60px; background: rgba(37, 99, 235, 0.15);">
                            <i class="fas fa-calendar fa-xl text-primary"></i>
                        </div>
                        <div>
                            <p class="text-muted mb-1 small">Total de agendamentos</p>
                            <h3 class="mb-0">{{ $agendamentosCount ?? 0 }}</h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('agendamentos.index') }}" class="btn btn-primary w-100">
                    <i class="fas fa-calendar"></i> Ver todos os agendamentos
                </a>
            </div>
        </div>
    </div>

    {{-- AÇÕES RÁPIDAS BARBEIRO --}}
    <div class="col-12 col-lg-4">
        <div class="panel p-4 h-100">

            <h3 class="h5 mb-3">
                <i class="fas fa-bolt me-2 text-primary"></i>
                Ações rápidas
            </h3>

            <ul class="list-group list-group-flush">

                <li class="list-group-item d-flex align-items-center justify-content-between gap-3 p-3 rounded-4 mb-2">
                    <div class="d-flex align-items-center gap-3">
                        <i class="fas fa-calendar-plus text-primary"></i>
                        <div>
                            <p class="mb-1 text-muted small">Agendar serviço</p>
                            <strong>Novo agendamento</strong>
                        </div>
                    </div>
                </li>

                <li class="list-group-item d-flex align-items-center justify-content-between gap-3 p-3 rounded-4 mb-2">
                    <div class="d-flex align-items-center gap-3">
                        <i class="fas fa-user text-primary"></i>
                        <div>
                            <p class="mb-1 text-muted small">Perfil</p>
                            <strong>Ver informações</strong>
                        </div>
                    </div>
                </li>

                <li class="list-group-item d-flex align-items-center justify-content-between gap-3 p-3 rounded-4">
                    <div class="d-flex align-items-center gap-3">
                        <i class="fas fa-sign-out-alt text-danger"></i>
                        <div>
                            <p class="mb-1 text-muted small">Sessão</p>
                            <strong>Logout</strong>
                        </div>
                    </div>
                </li>

            </ul>

        </div>
    </div>

    {{-- FIM DO DASHBOARD BARBEIRO --}}
    @endif

</div>
@endsection