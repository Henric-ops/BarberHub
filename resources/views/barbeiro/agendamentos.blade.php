@extends('layouts.app')

@section('content')
    <div class="container-fluid py-4">

        @if(session('success'))
            <div class="alert d-flex align-items-center gap-2">
                <i class="fas fa-check-circle"></i>
                {{ session('success') }}
            </div>
        @endif

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="page-title d-flex align-items-center gap-2">
                    <i class="fas fa-calendar-alt"></i>
                    Meus Agendamentos
                </h2>
                <p class="page-description">Seus agendamentos como barbeiro.</p>
            </div>
        </div>

        <div class="card agendamento-table">
            <div class="card-header-custom d-flex justify-content-between p-3">
                <span class="d-flex align-items-center gap-2">
                    <i class="fas fa-list"></i>
                    Lista de Agendamentos
                </span>
                <span class="badge badge-primary">{{ $agendamentos->count() }}</span>
            </div>

            <div class="table-responsive">
                <table class="table agendamento-table align-middle">
                    <thead>
                        <tr>
                            <th>Cliente</th>
                            <th>Serviço</th>
                            <th>Início</th>
                            <th>Fim</th>
                            <th>Status</th>
                            <th class="text-end">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($agendamentos as $agendamento)
                            <tr>
                                <td><strong class="cliente-nome">{{ $agendamento->cliente->nome }}</strong></td>
                                <td>
                                    <span class="badge servico-badge">{{ $agendamento->servico->nome }}</span>
                                </td>
                                <td><span class="datatime">{{ $agendamento->data_hora_inicio->format('d/m/Y H:i') }}</span></td>
                                <td><span class="datatime">{{ $agendamento->data_hora_fim->format('d/m/Y H:i') }}</span></td>
                                <td>
                                    <span class="status-chip status-chip--{{ $agendamento->status }}">
                                        {{ ucfirst($agendamento->status) }}
                                    </span>
                                </td>
                                <td class="text-end">
                                    <a href="{{ route('agendamentos.edit', $agendamento) }}"
                                        class="btn btn-sm btn-table-action btn-outline-primary" title="Alterar status">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-5">
                                    <i class="fas fa-calendar-times fa-3x text-muted mb-3 d-block"></i>
                                    <p class="text-muted mb-0">Nenhum agendamento encontrado</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection