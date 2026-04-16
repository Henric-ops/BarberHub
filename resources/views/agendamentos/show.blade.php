<div class="panel p-4 shadow-sm mx-auto" style="max-width: 600px;">

    <div class="mb-4 d-flex justify-content-between align-items-center">
        <div>
            <h3 class="fw-bold d-flex align-items-center gap-2">
                <i class="fas fa-calendar-check text-primary"></i>
                Detalhes do Agendamento
            </h3>
        </div>

        <a href="{{ route('agendamentos.index') }}" class="btn btn-outline-secondary">
            Voltar
        </a>
    </div>

    <div class="row g-3">

        <div class="col-6">
            <small class="text-muted">Cliente</small>
            <div class="fw-semibold">{{ $agendamento->cliente->nome }}</div>
        </div>

        <div class="col-6">
            <small class="text-muted">Barbeiro</small>
            <div class="fw-semibold">{{ $agendamento->barbeiro->name }}</div>
        </div>

        <div class="col-6">
            <small class="text-muted">Serviço</small>
            <div class="fw-semibold">
                <i class="fas fa-scissors me-1"></i>
                {{ $agendamento->servico->nome }}
            </div>
        </div>

        <div class="col-6">
            <small class="text-muted">Status</small>
            <div>
                <span class="status-chip status-chip--{{ $agendamento->status }}">
                    {{ ucfirst($agendamento->status) }}
                </span>
            </div>
        </div>

        <div class="col-6">
            <small class="text-muted">Início</small>
            <div>{{ $agendamento->data_hora_inicio->format('d/m/Y H:i') }}</div>
        </div>

        <div class="col-6">
            <small class="text-muted">Fim</small>
            <div>{{ $agendamento->data_hora_fim->format('d/m/Y H:i') }}</div>
        </div>

    </div>

</div>