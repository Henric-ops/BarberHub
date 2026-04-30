@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/form.css') }}">
<div class="form-container">
    <div class="form-card">

        <!-- HEADER -->
        <div class="form-header">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h2 class="form-title">
                        <i class="fas fa-calendar-edit"></i>
                        @if(auth()->user()->isAdministrador())
                            Editar Agendamento
                        @else
                            Atualizar Status
                        @endif
                    </h2>
                    <p class="form-subtitle">
                        Gerencie as informações do agendamento
                    </p>
                </div>

                <a href="{{ route('agendamentos.index') }}" class="btn-cancel">
                    <i class="fas fa-arrow-left"></i>
                </a>
            </div>
        </div>

        <!-- BODY -->
        <div class="form-body">
            <form action="{{ route('agendamentos.update', $agendamento) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-grid">

                    @if(auth()->user()->isAdministrador())

                        <!-- Cliente -->
                        <div>
                            <label class="form-label">Cliente</label>
                            <select name="cliente_id" class="form-select" required>
                                @foreach($clientes as $cliente)
                                    <option value="{{ $cliente->id }}"
                                        {{ $cliente->id == $agendamento->cliente_id ? 'selected' : '' }}>
                                        {{ $cliente->nome }}
                                    </option>
                                @endforeach
                            </select>
                            @error('cliente_id')
                                <div class="form-error">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Barbeiro -->
                        <div>
                            <label class="form-label">Barbeiro</label>
                            <select name="barbeiro_id" class="form-select" required>
                                @foreach($barbeiros as $barbeiro)
                                    <option value="{{ $barbeiro->id }}"
                                        {{ $barbeiro->id == $agendamento->barbeiro_id ? 'selected' : '' }}>
                                        {{ $barbeiro->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('barbeiro_id')
                                <div class="form-error">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Serviço -->
                        <div>
                            <label class="form-label">Serviço</label>
                            <select name="servico_id" class="form-select" required>
                                @foreach($servicos as $servico)
                                    <option value="{{ $servico->id }}"
                                        {{ $servico->id == $agendamento->servico_id ? 'selected' : '' }}>
                                        {{ $servico->nome }}
                                    </option>
                                @endforeach
                            </select>
                            @error('servico_id')
                                <div class="form-error">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Datas -->
                        <div class="form-row-2">
                            <div>
                                <label class="form-label">Data/Hora Início</label>
                                <input type="datetime-local" name="data_hora_inicio"
                                    value="{{ $agendamento->data_hora_inicio->format('Y-m-d\TH:i') }}"
                                    class="form-control" required>
                                @error('data_hora_inicio')
                                    <div class="form-error">{{ $message }}</div>
                                @enderror
                            </div>

                            <div>
                                <label class="form-label">Data/Hora Fim</label>
                                <input type="datetime-local" name="data_hora_fim"
                                    value="{{ $agendamento->data_hora_fim->format('Y-m-d\TH:i') }}"
                                    class="form-control" required>
                                @error('data_hora_fim')
                                    <div class="form-error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Status -->
                        <div>
                            <label class="form-label">Status</label>
                            <select name="status" class="form-select">
                                <option value="agendado" {{ $agendamento->status == 'agendado' ? 'selected' : '' }}>Agendado</option>
                                <option value="concluido" {{ $agendamento->status == 'concluido' ? 'selected' : '' }}>Concluído</option>
                                <option value="cancelado" {{ $agendamento->status == 'cancelado' ? 'selected' : '' }}>Cancelado</option>
                            </select>
                            @error('status')
                                <div class="form-error">{{ $message }}</div>
                            @enderror
                        </div>

                    @else

                        <!-- ALERT -->
                        <div class="form-alert">
                            <i class="fas fa-info-circle"></i>
                            Você pode atualizar apenas o status deste agendamento.
                        </div>

                        <!-- Cliente -->
                        <div>
                            <label class="form-label">Cliente</label>
                            <input type="text" class="form-control"
                                value="{{ $agendamento->cliente->nome }}" disabled>
                        </div>

                        <!-- Serviço -->
                        <div>
                            <label class="form-label">Serviço</label>
                            <input type="text" class="form-control"
                                value="{{ $agendamento->servico->nome }}" disabled>
                        </div>

                        <!-- Datas -->
                        <div class="form-row-2">
                            <div>
                                <label class="form-label">Início</label>
                                <input type="text" class="form-control"
                                    value="{{ $agendamento->data_hora_inicio->format('d/m/Y H:i') }}" disabled>
                            </div>

                            <div>
                                <label class="form-label">Fim</label>
                                <input type="text" class="form-control"
                                    value="{{ $agendamento->data_hora_fim->format('d/m/Y H:i') }}" disabled>
                            </div>
                        </div>

                        <!-- Status -->
                        <div>
                            <label class="form-label">Status</label>
                            <select name="status" class="form-select" required>
                                <option value="agendado" {{ $agendamento->status == 'agendado' ? 'selected' : '' }}>Agendado</option>
                                <option value="concluido" {{ $agendamento->status == 'concluido' ? 'selected' : '' }}>Concluído</option>
                                <option value="cancelado" {{ $agendamento->status == 'cancelado' ? 'selected' : '' }}>Cancelado</option>
                            </select>
                            @error('status')
                                <div class="form-error">{{ $message }}</div>
                            @enderror
                        </div>

                    @endif

                </div>

                <!-- ACTIONS -->
                <div class="form-actions">
                    <button type="submit" class="btn-submit">
                        <i class="fas fa-save"></i>
                        @if(auth()->user()->isAdministrador())
                            Atualizar
                        @else
                            Salvar Status
                        @endif
                    </button>

                    <a href="{{ route('agendamentos.index') }}" class="btn-cancel">
                        Cancelar
                    </a>
                </div>

            </form>
        </div>

    </div>
</div>
@endsection