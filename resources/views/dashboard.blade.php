@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

    <div class="kpi-strip">

        <div class="kpi-card">
            <div class="kpi-head">
                <div class="kpi-icon gold"><i class="fas fa-calendar-check"></i></div>
                <span class="kpi-trend up"><i class="fas fa-arrow-up"></i> +12%</span>
            </div>
            <div>
                <div class="kpi-val" data-target="248">0</div>
                <div class="kpi-label">Agendamentos totais</div>
            </div>
        </div>

        <div class="kpi-card">
            <div class="kpi-head">
                <div class="kpi-icon green"><i class="fas fa-users"></i></div>
                <span class="kpi-trend up"><i class="fas fa-arrow-up"></i> +8%</span>
            </div>
            <div>
                <div class="kpi-val" data-target="134">0</div>
                <div class="kpi-label">Clientes cadastrados</div>
            </div>
        </div>

        <div class="kpi-card">
            <div class="kpi-head">
                <div class="kpi-icon blue"><i class="fas fa-dollar-sign"></i></div>
                <span class="kpi-trend up"><i class="fas fa-arrow-up"></i> +7%</span>
            </div>
            <div>
                <div class="kpi-val" id="receita-val">R$ 0</div>
                <div class="kpi-label">Faturamento do mês</div>
            </div>
        </div>

        <div class="kpi-card">
            <div class="kpi-head">
                <div class="kpi-icon red"><i class="fas fa-exclamation-circle"></i></div>
                <span class="kpi-trend down"><i class="fas fa-arrow-down"></i> Atenção</span>
            </div>
            <div>
                <div class="kpi-val" data-target="3">0</div>
                <div class="kpi-label">Pendentes de confirmação</div>
            </div>
        </div>

    </div>

    <div class="content-grid">

        <div style="display:flex;flex-direction:column;gap:20px;">

            <div class="panel">
                <div class="panel-header">
                    <div>
                        <div class="panel-title"><i class="fas fa-calendar-day"></i> Agenda de hoje</div>
                        <div class="panel-sub">Hoje</div>
                    </div>

                    <div class="tab-pills">
                        <button class="tab-pill active">Todos</button>
                        <button class="tab-pill">Confirmados</button>
                        <button class="tab-pill">Pendentes</button>
                    </div>
                </div>

                <div class="schedule-body">

                    <div class="sched-row">
                        <div class="sched-info">
                            <div>
                                <!-- aqui vamos colocar os dados do cliente, serviço e horário do agendamento -->
                              
                            </div>
                        </div>
                    </div>

                    <div class="sched-row">

                    </div>

                </div>
            </div>

        </div>

        <!-- RIGHT -->
        <div class="right-col">

            <div class="actions-panel">
                <div class="panel-header">
                    <div class="panel-title"><i class="fas fa-bolt"></i> Ações rápidas</div>
                </div>

                <a href="{{ route('clientes.index') }}" class="action-item" style="text-decoration:none;color:inherit;">
                    <div class="action-icon" style="background:var(--green-dim);color:var(--green)">
                        <i class="fas fa-user-plus"></i>
                    </div>
                    <div class="action-text">
                        <div class="action-title">Clientes</div>
                        <div class="action-sub">Gerenciar clientes</div>
                    </div>
                </a>

                <a href="{{ route('servicos.index') }}" class="action-item" style="text-decoration:none;color:inherit;">
                    <div class="action-icon" style="background:var(--blue-dim);color:var(--blue)">
                        <i class="fas fa-scissors"></i>
                    </div>
                    <div class="action-text">
                        <div class="action-title">Serviços</div>
                        <div class="action-sub">Gerenciar serviços</div>
                    </div>
                </a>

                <a href="{{ route('agendamentos.index') }}" class="action-item" style="text-decoration:none;color:inherit;">
                    <div class="action-icon" style="background:var(--gold-dim);color:var(--gold)">
                        <i class="fas fa-calendar"></i>
                    </div>
                    <div class="action-text">
                        <div class="action-title">Agendamentos</div>
                        <div class="action-sub">Ver agenda</div>
                    </div>
                </a>

            </div>

        </div>

    </div>

@endsection