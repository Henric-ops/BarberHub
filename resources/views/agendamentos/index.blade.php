@extends('layouts.app')

@section('content')
    <div class="container-fluid py-4">

        {{-- ALERTAS --}}
        @if(session('success'))
            <div class="alert alert-success d-flex align-items-center gap-2 shadow-sm">
                <i class="fas fa-check-circle"></i>
                {{ session('success') }}
            </div>
        @endif

        {{-- HEADER --}}
        <div
            class="d-flex flex-column flex-md-row align-items-start align-items-md-center justify-content-between gap-3 mb-4">
            <div>
                <h1 class="h2 mb-1 d-flex align-items-center gap-2">
                    <i class="fas fa-calendar-alt text-primary"></i>
                    Agendamentos
                </h1>
                <p class="text-muted mb-0">
                    Gerencie a agenda de clientes e barbeiros de forma simples e eficiente.
                </p>
            </div>

            @if(auth()->user()->isAdministrador())
                <a href="{{ route('agendamentos.create') }}" class="btn btn-primary btn-lg rounded-pill shadow-sm">
                    <i class="fas fa-plus me-2"></i> Novo agendamento
                </a>
            @endif
        </div>

        {{-- BUSCA --}}
        <form method="GET" class="mb-4">
            <div class="input-group shadow-sm rounded-pill overflow-hidden border">
                <span class="input-group-text bg-white border-0">
                    <i class="fas fa-search text-muted"></i>
                </span>
                <input type="search" name="search" value="{{ request('search') }}"
                    placeholder="Buscar por cliente ou barbeiro..." class="form-control border-0">
                <button class="btn btn-primary px-4" type="submit">
                    Buscar
                </button>
            </div>
        </form>

        <div class="card border-0 shadow-sm rounded-4 overflow-hidden">

            <div class="p-3 border-bottom d-flex justify-content-between align-items-center">
                <strong class="d-flex align-items-center gap-2">
                    <i class="fas fa-list text-primary"></i>
                    Lista de agendamentos
                </strong>
                <span class="text-muted small">{{ $agendamentos->count() }} registros</span>
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">

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
                        @foreach($agendamentos as $agendamento)
                            <tr>

                                <td>
                                    <strong>{{ $agendamento->cliente->nome }}</strong>
                                </td>

                                <td>{{ $agendamento->barbeiro->name }}</td>

                                <td>
                                    <span class="badge bg-light text-dark">
                                        <i class="fas fa-scissors me-1"></i>
                                        {{ $agendamento->servico->nome }}
                                    </span>
                                </td>

                                <td>{{ $agendamento->data_hora_inicio->format('d/m/Y H:i') }}</td>
                                <td>{{ $agendamento->data_hora_fim->format('d/m/Y H:i') }}</td>

                                <td>
                                    <span class="status-chip status-chip--{{ $agendamento->status ?? 'agendado' }}">
                                        {{ ucfirst($agendamento->status ?? 'agendado') }}
                                    </span>
                                </td>

                                <td class="text-end">

                                    <a href="{{ route('agendamentos.edit', $agendamento) }}" class="btn btn-sm btn-light me-2">
                                        <i class="fas fa-pen"></i>
                                    </a>

                                    <form action="{{ route('agendamentos.destroy', $agendamento) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-light text-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>

                                </td>

                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>

        </div>

    </div>
@endsection