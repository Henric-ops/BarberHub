@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

    <div class="kpi-strip">

        <div class="kpi-card">
            <div class="kpi-head">
                <div class="kpi-icon gold"><i class="fas fa-calendar-check"></i></div>
            </div>
            <div>
                <div class="kpi-val">{{ $agendamentosCount }}</div>
                <div class="kpi-label">Agendamentos totais</div>
            </div>
        </div>

        <div class="kpi-card">
            <div class="kpi-head">
                <div class="kpi-icon green"><i class="fas fa-users"></i></div>
            </div>
            <div>
                <div class="kpi-val">{{ $clientesCount }}</div>
                <div class="kpi-label">Clientes cadastrados</div>
            </div>
        </div>

        <div class="kpi-card">
            <div class="kpi-head">
                <div class="kpi-icon blue"><i class="fas fa-dollar-sign"></i></div>
            </div>
            <div>
                <div class="kpi-val">R$ {{ number_format($faturamentoMes, 2, ',', '.') }}</div>
                <div class="kpi-label">Faturamento do mês</div>
            </div>
        </div>

        <div class="kpi-card">
            <div class="kpi-head">
                <div class="kpi-icon red"><i class="fas fa-exclamation-circle"></i></div>
            </div>
            <div>
                <div class="kpi-val">{{ $pendentesCount }}</div>
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
                        <div class="panel-sub">{{ now()->format('d/m/Y') }}</div>
                    </div>
                </div>

                <div style="overflow-x: auto;">
                    <table class="table table-sm" style="margin-bottom: 0">
                        <thead style="background: var(--bg-card)">
                            <tr>
                                <th style="padding: 12px 16px;">Horário</th>
                                <th style="padding: 12px 16px;">Cliente</th>
                                <th style="padding: 12px 16px;">Barbeiro</th>
                                <th style="padding: 12px 16px;">Serviço</th>
                                <th style="padding: 12px 16px;">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($agendamentosHoje as $agendamento)
                                <tr>
                                    <td style="padding: 12px 16px;">
                                        <span class="datatime">
                                            {{ $agendamento->data_hora_inicio->format('H:i') }}
                                            — {{ $agendamento->data_hora_fim->format('H:i') }}
                                        </span>
                                    </td>
                                    <td style="padding: 12px 16px;">
                                        <strong>{{ $agendamento->cliente->nome }}</strong>
                                    </td>
                                    <td style="padding: 12px 16px;">
                                        {{ $agendamento->barbeiro->name }}
                                    </td>
                                    <td style="padding: 12px 16px;">
                                        <span class="badge servico-badge">
                                            {{ $agendamento->servico->nome }}
                                        </span>
                                    </td>
                                    <td style="padding: 12px 16px;">
                                        <span class="status-chip status-chip--{{ $agendamento->status }}">
                                            {{ ucfirst($agendamento->status) }}
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" style="padding: 32px; text-align: center; color: var(--text-muted);">
                                        <i class="fas fa-calendar-times"
                                            style="font-size: 2rem; display:block; margin-bottom: 8px;"></i>
                                        Nenhum agendamento para hoje.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
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
                        <div class="action-sub">Ver agenda completa</div>
                    </div>
                </a>

                <a href="{{ route('barbeiros.index') }}" class="action-item" style="text-decoration:none;color:inherit;">
                    <div class="action-icon" style="background:var(--gold-dim);color:var(--gold)">
                        <i class="fas fa-user-tie"></i>
                    </div>
                    <div class="action-text">
                        <div class="action-title">Barbeiros</div>
                        <div class="action-sub">Gerenciar barbeiros</div>
                    </div>
                </a>

            </div>
        </div>

    </div>

@endsection