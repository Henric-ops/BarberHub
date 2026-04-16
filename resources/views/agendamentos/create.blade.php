@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="d-flex flex-column flex-md-row align-items-start align-items-md-center justify-content-between mb-4 gap-3">
                    <div>
                        <h1 class="h3">Novo Agendamento</h1>
                        <p class="text-muted mb-0">Associe cliente, barbeiro e serviço a uma data e horário.</p>
                    </div>
                    <a href="{{ route('agendamentos.index') }}" class="btn btn-outline-secondary">Voltar</a>
                </div>

                <form method="POST" action="{{ route('agendamentos.store') }}">
                    @csrf
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Cliente</label>
                            <select name="cliente_id" required class="form-select rounded-4">
                                <option value="">Selecione</option>
                                @foreach($clientes as $cliente)
                                    <option value="{{ $cliente->id }}" {{ old('cliente_id') == $cliente->id ? 'selected' : '' }}>{{ $cliente->nome }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Barbeiro</label>
                            <select name="barbeiro_id" required class="form-select rounded-4">
                                <option value="">Selecione</option>
                                @foreach($barbeiros as $barbeiro)
                                    <option value="{{ $barbeiro->id }}" {{ old('barbeiro_id') == $barbeiro->id ? 'selected' : '' }}>{{ $barbeiro->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Serviço</label>
                            <select name="servico_id" required class="form-select rounded-4">
                                <option value="">Selecione</option>
                                @foreach($servicos as $servico)
                                    <option value="{{ $servico->id }}" {{ old('servico_id') == $servico->id ? 'selected' : '' }}>{{ $servico->nome }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Status</label>
                            <select name="status" class="form-select rounded-4">
                                <option value="agendado" {{ old('status') == 'agendado' ? 'selected' : '' }}>Agendado</option>
                                <option value="concluido" {{ old('status') == 'concluido' ? 'selected' : '' }}>Concluído</option>
                                <option value="cancelado" {{ old('status') == 'cancelado' ? 'selected' : '' }}>Cancelado</option>
                            </select>
                        </div>
                    </div>

                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <label class="form-label">Início</label>
                            <input type="datetime-local" name="data_hora_inicio" value="{{ old('data_hora_inicio') }}" required class="form-control rounded-4" />
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Fim</label>
                            <input type="datetime-local" name="data_hora_fim" value="{{ old('data_hora_fim') }}" required class="form-control rounded-4" />
                        </div>
                    </div>

                    <button type="submit" class="btn btn-dark btn-lg rounded-4">Salvar agendamento</button>
                </form>
            </div>
        </div>
    </div>
@endsection
