@extends('layouts.app')

@section('content')
    <div class="row g-4">
        <div class="col-12">
            <div class="page-header d-flex flex-column flex-md-row align-items-start align-items-md-center justify-content-between gap-3">
                <div>
                    <h2 class="page-title mb-1">Olá, {{ auth()->user()->name }}</h2>
                    <p class="page-description mb-0">Visão clara da barbearia com métricas e ações prioritárias.</p>
                </div>
                <div class="d-flex flex-wrap gap-2">
                    <a href="{{ route('agendamentos.create') }}" class="btn btn-primary">Novo agendamento</a>
                    <a href="{{ route('clientes.index') }}" class="btn btn-outline-secondary">Ver clientes</a>
                </div>
            </div>
        </div>

        <div class="col-12 col-xl-7">
            <div class="panel panel-hero p-5">
                <span class="badge bg-white text-primary rounded-pill mb-3">Painel</span>
                <h1 class="text-white mb-3">Gestão inteligente para sua barbearia</h1>
                <p class="text-white-75 mb-4">Acompanhe agendamentos, clientes e serviços com uma experiência limpa, leve e focada em ação.</p>

                <div class="row g-3">
                    <div class="col-6">
                        <div class="rounded-4 bg-white bg-opacity-15 p-3">
                            <p class="text-white-75 mb-1 small">Agendamentos</p>
                            <h3 class="text-white mb-0">{{ $agendamentosCount }}</h3>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="rounded-4 bg-white bg-opacity-15 p-3">
                            <p class="text-white-75 mb-1 small">Clientes</p>
                            <h3 class="text-white mb-0">{{ $clientesCount }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-xl-5">
            <div class="row g-4">
                <div class="col-12 col-sm-4">
                    <div class="panel p-4 text-center">
                        <p class="text-uppercase text-muted small mb-2">Agenda</p>
                        <h3 class="mb-0">{{ $agendamentosCount }}</h3>
                    </div>
                </div>
                <div class="col-12 col-sm-4">
                    <div class="panel p-4 text-center">
                        <p class="text-uppercase text-muted small mb-2">Clientes</p>
                        <h3 class="mb-0">{{ $clientesCount }}</h3>
                    </div>
                </div>
                <div class="col-12 col-sm-4">
                    <div class="panel p-4 text-center">
                        <p class="text-uppercase text-muted small mb-2">Serviços</p>
                        <h3 class="mb-0">{{ $servicosCount }}</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-7">
            <div class="panel p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <div>
                        <h3 class="h5 mb-1">Visão geral</h3>
                        <p class="text-muted mb-0">Resumo rápido dos principais indicadores.</p>
                    </div>
                    <span class="badge btn-secondary py-2 px-3">Atual</span>
                </div>

                <div class="row g-3">
                    <div class="col-6">
                        <div class="rounded-4 border border-1 border-[#E5E7EB] p-3">
                            <p class="text-muted mb-2 small">Agenda ativa</p>
                            <h4 class="mb-1">8</h4>
                            <span class="text-success">+12% último mês</span>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="rounded-4 border border-1 border-[#E5E7EB] p-3">
                            <p class="text-muted mb-2 small">Faturamento</p>
                            <h4 class="mb-1">R$ 1.717,98</h4>
                            <span class="text-success">+7% crescimento</span>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="rounded-4 border border-1 border-[#E5E7EB] p-3">
                            <p class="text-muted mb-2 small">Capacidade</p>
                            <h4 class="mb-1">Sim</h4>
                            <span class="text-success">Agenda fluindo</span>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="rounded-4 border border-1 border-[#E5E7EB] p-3">
                            <p class="text-muted mb-2 small">Ações pendentes</p>
                            <h4 class="mb-1">3</h4>
                            <span class="text-danger">Revisar hoje</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-5">
            <div class="panel p-4 h-100">
                <h3 class="h5 mb-3">Ações rápidas</h3>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex align-items-center justify-content-between gap-3 p-3 rounded-4 mb-2">
                        <div>
                            <p class="mb-1 text-muted small">Clientes novos</p>
                            <strong>4 cadastros</strong>
                        </div>
                        <span class="badge bg-secondary rounded-pill">Hoje</span>
                    </li>
                    <li class="list-group-item d-flex align-items-center justify-content-between gap-3 p-3 rounded-4 mb-2">
                        <div>
                            <p class="mb-1 text-muted small">Serviços adicionados</p>
                            <strong>2</strong>
                        </div>
                        <span class="badge bg-secondary rounded-pill">Semana</span>
                    </li>
                    <li class="list-group-item d-flex align-items-center justify-content-between gap-3 p-3 rounded-4">
                        <div>
                            <p class="mb-1 text-muted small">Aguardando confirmação</p>
                            <strong>1</strong>
                        </div>
                        <span class="badge bg-secondary rounded-pill">Urgente</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection
