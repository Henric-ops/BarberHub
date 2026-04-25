@extends('layouts.app')

@section('title', 'Meu Painel')

@section('content')
<style>
@import url('https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;600;700&family=DM+Sans:opsz,wght@9..40,300;9..40,400;9..40,500;9..40,600&display=swap');
</style>
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<div class="barb-page">

    {{-- ── HERO ─────────────────────────────────────────────── --}}
    <div class="barb-hero a1">
        <div>
            <h1 class="barb-hero-greeting">
                Olá, <span>{{ explode(' ', auth()->user()->name)[0] }}</span> 👋
            </h1>
            <div class="barb-hero-date">
                <strong id="barb-date"></strong>
            </div>
        </div>

        @if($proximoCliente)
            <div class="next-client-pill">
                <div class="pill-icon"><i class="fas fa-clock"></i></div>
                <div>
                    <div class="pill-label">Próximo cliente</div>
                    <div class="pill-value">
                        {{ $proximoCliente->cliente->nome }}
                        <span class="pill-time">
                            {{ $proximoCliente->data_hora_inicio->format('H:i') }}
                        </span>
                    </div>
                </div>
            </div>
        @endif
    </div>

    {{-- ── KPIs ─────────────────────────────────────────────── --}}
    <div class="barb-kpis a2">

        <div class="barb-kpi kpi-gold">
            <div class="barb-kpi-icon"><i class="fas fa-calendar-check"></i></div>
            <div>
                <div class="barb-kpi-val">{{ $agendamentosCount }}</div>
                <div class="barb-kpi-label">Total de agendamentos</div>
            </div>
        </div>

        <div class="barb-kpi kpi-green">
            <div class="barb-kpi-icon"><i class="fas fa-circle-check"></i></div>
            <div>
                <div class="barb-kpi-val">{{ $concluidosCount }}</div>
                <div class="barb-kpi-label">Concluídos</div>
            </div>
        </div>

        <div class="barb-kpi kpi-red">
            <div class="barb-kpi-icon"><i class="fas fa-circle-xmark"></i></div>
            <div>
                <div class="barb-kpi-val">{{ $canceladosCount }}</div>
                <div class="barb-kpi-label">Cancelados</div>
            </div>
        </div>

    </div>

    {{-- ── CONTENT GRID ──────────────────────────────────────── --}}
    <div class="barb-content">

        {{-- ── LEFT: AGENDA DO DIA ──────────────────────────── --}}
        <div class="barb-panel a3">
            <div class="barb-panel-head">
                <div class="barb-panel-title">
                    <i class="fas fa-calendar-day"></i> Agenda de Hoje
                </div>
                <span class="barb-panel-badge">{{ $agendamentosHoje->count() }}</span>
            </div>

            @if($agendamentosHoje->isEmpty())
                <div class="barb-empty">
                    <i class="fas fa-sun"></i>
                    <p>Nenhum agendamento para hoje.</p>
                </div>
            @else
                <div style="overflow-x:auto">
                    <table class="barb-table">
                        <thead>
                            <tr>
                                <th>Horário</th>
                                <th>Cliente</th>
                                <th>Serviço</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($agendamentosHoje as $ag)
                                <tr>
                                    <td>
                                        <div class="barb-time">{{ $ag->data_hora_inicio->format('H:i') }}</div>
                                        <div class="barb-time-end">até {{ $ag->data_hora_fim->format('H:i') }}</div>
                                    </td>
                                    <td>
                                        <div class="barb-client-name">{{ $ag->cliente->nome }}</div>
                                    </td>
                                    <td>
                                        <span class="barb-service-tag">
                                            <i class="fas fa-scissors" style="font-size:.65rem"></i>
                                            {{ $ag->servico->nome }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="s-chip s-chip--{{ $ag->status }}">
                                            {{ ucfirst($ag->status) }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ route('agendamentos.edit', $ag) }}"
                                           style="color:var(--text-muted);font-size:.8rem;text-decoration:none;transition:color .2s"
                                           onmouseover="this.style.color='var(--gold)'"
                                           onmouseout="this.style.color='var(--text-muted)'"
                                           title="Editar">
                                            <i class="fas fa-pen-to-square"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    
    </div>

</div>

<script>
    const el = document.getElementById('barb-date');
    if (el) {
        el.textContent = new Date().toLocaleDateString('pt-BR', {
            weekday: 'long', day: 'numeric', month: 'long', year: 'numeric'
        });
    }
</script>

@endsection