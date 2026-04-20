@extends('layouts.app')

@section('content')
    <div class="container-fluid py-4">
        <div class="card rounded-lg shadow-md" style="max-width: 700px; margin: 0 auto;">
            <div class="p-4 border-bottom" style="background: linear-gradient(135deg, #2563EB 0%, #3B82F6 100%); color: #fff;">
                <div class="d-flex justify-content-between align-items-center">
                    <h2 class="h3 mb-0 d-flex align-items-center gap-2" style="color: #fff;">
                        <i class="fas fa-calendar-plus"></i>
                        Novo Agendamento
                    </h2>
                    <a href="{{ route('agendamentos.index') }}" class="btn btn-outline-light btn-sm">
                        <i class="fas fa-arrow-left"></i> Voltar
                    </a>
                </div>
            </div>

            <div class="p-4 p-md-5">
                <form action="{{ route('agendamentos.store') }}" method="POST">
                    @csrf

                    <div class="row g-3">

                        <!-- Cliente -->
                        <div class="col-12 fade-in delay-100">
                            <label class="form-label">
                                <i class="fas fa-user" style="color: #059669;"></i> Cliente
                            </label>
                            <select name="cliente_id" class="form-select rounded-lg" required>
                                <option value="">Selecione um cliente</option>
                                @foreach($clientes as $cliente)
                                    <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
                                @endforeach
                            </select>
                            @error('cliente_id')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Barbeiro -->
                        <div class="col-12 fade-in delay-200">
                            <label class="form-label">
                                <i class="fas fa-user-tie" style="color: #2563EB;"></i> Barbeiro
                            </label>
                            <select name="barbeiro_id" class="form-select rounded-lg" required>
                                <option value="">Selecione um barbeiro</option>
                                @foreach($barbeiros as $barbeiro)
                                    <option value="{{ $barbeiro->id }}">{{ $barbeiro->name }}</option>
                                @endforeach
                            </select>
                            @error('barbeiro_id')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Serviço -->
                        <div class="col-12 fade-in delay-300">
                            <label class="form-label">
                                <i class="fas fa-scissors" style="color: #F97316;"></i> Serviço
                            </label>
                            <select name="servico_id" class="form-select rounded-lg" required>
                                <option value="">Selecione um serviço</option>
                                @foreach($servicos as $servico)
                                    <option value="{{ $servico->id }}">{{ $servico->nome }}</option>
                                @endforeach
                            </select>
                            @error('servico_id')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Início -->
                        <div class="col-md-6 fade-in delay-400">
                            <label class="form-label">
                                <i class="fas fa-clock" style="color: #2563EB;"></i> Data e Hora Início
                            </label>
                            <input type="datetime-local" name="data_hora_inicio" class="form-control rounded-lg" required>
                            @error('data_hora_inicio')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Fim -->
                        <div class="col-md-6 fade-in delay-500">
                            <label class="form-label">
                                <i class="fas fa-clock" style="color: #059669;"></i> Data e Hora Fim
                            </label>
                            <input type="datetime-local" name="data_hora_fim" class="form-control rounded-lg" required>
                            @error('data_hora_fim')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Status -->
                        <div class="col-12 fade-in delay-600">
                            <label class="form-label">
                                <i class="fas fa-list-check" style="color: #F97316;"></i> Status
                            </label>
                            <select name="status" class="form-select rounded-lg">
                                <option value="agendado">Agendado</option>
                                <option value="concluido">Concluído</option>
                                <option value="cancelado">Cancelado</option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                    <div class="d-flex gap-2 mt-5 fade-in delay-700">
                        <button type="submit" class="btn btn-primary btn-lg">
                            <i class="fas fa-save"></i> Agendar
                        </button>
                        <a href="{{ route('agendamentos.index') }}" class="btn btn-outline-secondary btn-lg">
                            <i class="fas fa-times"></i> Cancelar
                        </a>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection