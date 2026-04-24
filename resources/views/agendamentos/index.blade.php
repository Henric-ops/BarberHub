@extends('layouts.app')

@section('content')

    <div class="container-fluid py-4">

        {{-- ALERTAS --}}
        @if(session('success'))
            <div class="alert d-flex align-items-center gap-2">
                <i class="fas fa-check-circle"></i>
                {{ session('success') }}
            </div>
        @endif

        {{-- HEADER --}}
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4">
            <div>
                <h2 class="page-title d-flex align-items-center gap-2">
                    <i class="fas fa-calendar-alt" style="color: var(--gold)"></i>
                    Agendamentos
                </h2>
                <p class="page-description">
                    Gerencie a agenda de clientes e barbeiros.
                </p>
            </div>

            @if(auth()->user()->isAdministrador())
                <a href="{{ route('agendamentos.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Novo
                </a>
            @endif
        </div>

        {{-- BUSCA --}}
        <form method="GET" class="mb-4">
            <div class="input-group">
                <span class="input-group-text">
                    <i class="fas fa-search"></i>
                </span>
                <input type="search" name="search" value="{{ request('search') }}" placeholder="Buscar..."
                    class="form-control">
                <button class="btn btn-primary px-4" type="submit">
                    Buscar
                </button>
            </div>
        </form>

        <div class="card">

            <div class="card-header-custom d-flex justify-content-between p-3">
                <span><i class="fas fa-list"></i> Lista</span>
                <span class="badge badge-primary">
                    {{ $agendamentos->count() }}
                </span>
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-middle">

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
                                <td><strong>{{ $agendamento->cliente->nome }}</strong></td>
                                <td>{{ $agendamento->barbeiro->name }}</td>

                                <td>
                                    <span class="badge">
                                        {{ $agendamento->servico->nome }}
                                    </span>
                                </td>

                                <td>{{ $agendamento->data_hora_inicio->format('d/m/Y H:i') }}</td>
                                <td>{{ $agendamento->data_hora_fim->format('d/m/Y H:i') }}</td>

                                <td>
                                    <span class="status-chip status-chip--{{ $agendamento->status }}">
                                        {{ ucfirst($agendamento->status) }}
                                    </span>
                                </td>

                                <td class="text-end d-flex gap-2 justify-content-end">
                                    <a href="{{ route('agendamentos.edit', $agendamento) }}"
                                        class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    @if(auth()->user()->isAdministrador())
                                        <form action="{{ route('agendamentos.destroy', $agendamento) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    @endif
                                </td>

                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>

        </div>

    </div>

@endsection