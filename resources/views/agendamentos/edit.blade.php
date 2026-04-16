@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="d-flex flex-column flex-md-row align-items-start align-items-md-center justify-content-between mb-4 gap-3">
                    <div>
                        <h1 class="h3">Editar Agendamento</h1>
                        <p class="text-muted mb-0">Atualize o agendamento ou apenas o status.</p>
                    </div>
                    <a href="{{ route('agendamentos.index') }}" class="btn btn-outline-secondary">Voltar</a>
                </div>

                <form method="POST" action="{{ route('agendamentos.update', $agendamento) }}">
                    @csrf
                    @method('PUT')

                    @if(auth()->user()->isAdministrador())
                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Cliente</label>
                                <select name="cliente_id" required class="form-select rounded-4">
                                    @foreach($clientes as $cliente)
                                        <option value="{{ $cliente->id }}" {{ old('cliente_id', $agendamento->cliente_id) == $cliente->id ? 'selected' : '' }}>{{ $cliente->nome }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Barbeiro</label>
                                <select name="barbeiro_id" required class="form-select rounded-4">
                                    @foreach($barbeiros as $barbeiro)
                                        <option value="{{ $barbeiro->id }}" {{ old('barbeiro_id', $agendamento->barbeiro_id) == $barbeiro->id ? 'selected' : '' }}>{{ $barbeiro->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Serviço</label>
                            <select name="servico_id" required class="form-select rounded-4">
                                @foreach($servicos as $servico)
                                    <option value="{{ $servico->id }}" {{ old('servico_id', $agendamento->servico_id) == $servico->id ? 'selected' : '' }}>{{ $servico->nome }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Início</label>
                                <input type="datetime-local" name="data_hora_inicio" value="{{ old('data_hora_inicio', $agendamento->data_hora_inicio?->format('Y-m-d\TH:i')) }}" required class="form-control rounded-4" />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Fim</label>
                                <input type="datetime-local" name="data_hora_fim" value="{{ old('data_hora_fim', $agendamento->data_hora_fim?->format('Y-m-d\TH:i')) }}" required class="form-control rounded-4" />
                            </div>
                        </div>
                    @else
                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Cliente</label>
                                <input type="text" value="{{ $agendamento->cliente->nome }}" disabled class="form-control rounded-4" />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Barbeiro</label>
                                <input type="text" value="{{ $agendamento->barbeiro->name }}" disabled class="form-control rounded-4" />
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Serviço</label>
                            <input type="text" value="{{ $agendamento->servico->nome }}" disabled class="form-control rounded-4" />
                        </div>

                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Início</label>
                                <input type="text" value="{{ $agendamento->data_hora_inicio->format('d/m/Y H:i') }}" disabled class="form-control rounded-4" />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Fim</label>
                                <input type="text" value="{{ $agendamento->data_hora_fim->format('d/m/Y H:i') }}" disabled class="form-control rounded-4" />
                            </div>
                        </div>
                    @endif

                    <div class="mb-4">
                        <label class="form-label">Status</label>
                        <select name="status" required class="form-select rounded-4">
                            <option value="agendado" {{ old('status', $agendamento->status) == 'agendado' ? 'selected' : '' }}>Agendado</option>
                            <option value="concluido" {{ old('status', $agendamento->status) == 'concluido' ? 'selected' : '' }}>Concluído</option>
                            <option value="cancelado" {{ old('status', $agendamento->status) == 'cancelado' ? 'selected' : '' }}>Cancelado</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-dark btn-lg rounded-4">Salvar alterações</button>
                </form>
            </div>
        </div>
    </div>
@endsection
