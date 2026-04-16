@extends('layouts.app')

@section('content')
    <div class="container-fluid py-4">

        <div class="panel p-4 mx-auto" style="max-width: 700px;">

            <!-- HEADER -->
            <div class="mb-4 d-flex justify-content-between align-items-center">
                <h3 class="fw-bold d-flex align-items-center gap-2">
                    <i class="fas fa-plus-circle text-primary"></i>
                    Novo Agendamento
                </h3>

                <a href="{{ route('agendamentos.index') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left me-1"></i> Voltar
                </a>
            </div>

            <!-- FORM -->
            <form action="{{ route('agendamentos.store') }}" method="POST">
                @csrf

                <div class="row g-3">

                    <!-- Cliente -->
                    <div class="col-12">
                        <label class="form-label">Cliente</label>
                        <select name="cliente_id" class="form-select rounded-4 shadow-sm" required>
                            <option value="">Selecione</option>
                            @foreach($clientes as $cliente)
                                <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Barbeiro -->
                    <div class="col-12">
                        <label class="form-label">Barbeiro</label>
                        <select name="barbeiro_id" class="form-select rounded-4 shadow-sm" required>
                            <option value="">Selecione</option>
                            @foreach($barbeiros as $barbeiro)
                                <option value="{{ $barbeiro->id }}">{{ $barbeiro->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Serviço -->
                    <div class="col-12">
                        <label class="form-label">Serviço</label>
                        <select name="servico_id" class="form-select rounded-4 shadow-sm" required>
                            <option value="">Selecione</option>
                            @foreach($servicos as $servico)
                                <option value="{{ $servico->id }}">{{ $servico->nome }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Início -->
                    <div class="col-md-6">
                        <label class="form-label">Data e Hora Início</label>
                        <input type="datetime-local" name="data_hora_inicio" class="form-control rounded-4 shadow-sm"
                            required>
                    </div>

                    <!-- Fim -->
                    <div class="col-md-6">
                        <label class="form-label">Data e Hora Fim</label>
                        <input type="datetime-local" name="data_hora_fim" class="form-control rounded-4 shadow-sm" required>
                    </div>

                    <!-- Status -->
                    <div class="col-12">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select rounded-4 shadow-sm">
                            <option value="agendado">Agendado</option>
                            <option value="concluido">Concluído</option>
                            <option value="cancelado">Cancelado</option>
                        </select>
                    </div>

                </div>

                <!-- BOTÃO -->
                <div class="mt-4 d-flex justify-content-end">
                    <button class="btn btn-primary px-4 rounded-pill">
                        <i class="fas fa-save me-2"></i> Salvar
                    </button>
                </div>

            </form>

        </div>

    </div>
@endsection