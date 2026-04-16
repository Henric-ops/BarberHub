@extends('layouts.app')

@section('content')
    <div class="container-fluid py-4">
        <div class="d-flex flex-column flex-md-row align-items-start align-items-md-center justify-content-between gap-3 mb-4">
            <div>
                <h1 class="h2 mb-1">Agendamentos</h1>
                <p class="text-muted mb-0">Gerencie a agenda de clientes e barbeiros de forma simples e precisa.</p>
            </div>
            @if(auth()->user()->isAdministrador())
                <a href="{{ route('agendamentos.create') }}" class="btn btn-secondary btn-lg rounded-pill">Novo agendamento</a>
            @endif
        </div>

        <form method="GET" class="mb-4">
            <div class="input-group shadow-sm rounded-pill overflow-hidden border" style="border-color: var(--color-border);">
                <input type="search" name="search" value="{{ request('search') }}" placeholder="Buscar por cliente ou barbeiro" class="form-control" aria-label="Buscar">
                <button class="btn btn-primary px-4" type="submit">Buscar</button>
            </div>
        </form>

        <div class="custom-table-card overflow-hidden">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th>Cliente</th>
                            <th>Barbeiro</th>
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
                                <td>{{ $agendamento->cliente->nome }}</td>
                                <td>{{ $agendamento->barbeiro->name }}</td>
                                <td>{{ $agendamento->servico->nome }}</td>
                                <td>{{ $agendamento->data_hora_inicio->format('d/m/Y H:i') }}</td>
                                <td>{{ $agendamento->data_hora_fim->format('d/m/Y H:i') }}</td>
                                <td>
                                    <span class="status-chip status-chip--{{ $agendamento->status ?? 'agendado' }}">{{ ucfirst($agendamento->status ?? 'agendado') }}</span>
                                </td>
                                <td class="text-end">
                                    <a href="{{ route('agendamentos.edit', $agendamento) }}" class="btn btn-sm btn-outline-secondary me-2">Editar</a>
                                    @if(auth()->user()->isAdministrador())
                                        <form action="{{ route('agendamentos.destroy', $agendamento) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-dark">Excluir</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center text-muted py-4">Nenhum agendamento encontrado.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
