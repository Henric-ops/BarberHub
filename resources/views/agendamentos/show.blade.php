    <div class="card rounded-lg shadow-md" style="max-width: 600px; margin: 0 auto;">
        <div class="p-4 border-bottom" style="background: linear-gradient(135deg, #c9a84c 0%, #d4b766 100%); color: #fff;">
            <div class="d-flex justify-content-between align-items-center">
                <h2 class="h3 mb-0 d-flex align-items-center gap-2" style="color: #fff;">
                    <i class="fas fa-calendar-check"></i>
                    Detalhes do Agendamento
                </h2>
                <a href="{{ route('agendamentos.index') }}" class="btn btn-outline-light btn-sm">
                    <i class="fas fa-arrow-left"></i> Voltar
                </a>
            </div>
        </div>

        <div class="p-4 p-md-5">

            <div class="row g-3">
                <div class="col-md-6">
                    <small class="text-muted d-block mb-1">Cliente</small>
                    <div class="fw-semibold">{{ $agendamento->cliente->nome }}</div>
                </div>

                <div class="col-md-6">
                    <small class="text-muted d-block mb-1">Barbeiro</small>
                    <div class="fw-semibold">{{ $agendamento->barbeiro->name }}</div>
                </div>

                <div class="col-md-6">
                    <small class="text-muted d-block mb-1">Serviço</small>
                    <div class="fw-semibold">
                        <i class="fas fa-scissors me-1" style="color: #F97316;"></i>
                        {{ $agendamento->servico->nome }}
                    </div>
                </div>

                <div class="col-md-6">
                    <small class="text-muted d-block mb-1">Status</small>
                    <div>
                        <span class="status-chip status-chip--{{ $agendamento->status }}">
                            {{ ucfirst($agendamento->status) }}
                        </span>
                    </div>
                </div>

                <div class="col-md-6">
                    <small class="text-muted d-block mb-1">Início</small>
                    <div>{{ $agendamento->data_hora_inicio->format('d/m/Y H:i') }}</div>
                </div>

                <div class="col-md-6">
                    <small class="text-muted d-block mb-1">Fim</small>
                    <div>{{ $agendamento->data_hora_fim->format('d/m/Y H:i') }}</div>
                </div>
            </div>
        </div>
    </div>