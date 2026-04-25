@extends('layouts.app')

@section('content')
    <style>
        .form-card {
            background: transparent !important;
            border: 1px solid var(--border);
            border-radius: var(--radius);
            overflow: hidden;
            max-width: 700px;
            margin: 0 auto;
        }

        .form-header {
            background: linear-gradient(135deg, var(--gold) 0%, var(--gold-mid) 100%);
            border: none;
            color: var(--bg-base) !important;
            padding: 1.5rem 2rem;
        }

        .form-header h2 {
            color: var(--bg-base) !important;
            font-weight: 700;
            margin: 0;
            font-size: 1.5rem;
        }

        .form-body {
            background: var(--bg-card);
            padding: 2.5rem;
        }

        .form-label {
            color: var(--text);
            font-weight: 600;
            margin-bottom: 0.75rem;
            font-size: 0.95rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .form-label i {
            color: var(--gold);
            width: 16px;
            font-size: 0.9rem;
        }

        .form-control,
        .form-select {
            background: var(--bg-panel);
            border: 1px solid var(--border-light);
            color: var(--text);
            border-radius: var(--radius-sm);
            padding: 0.875rem 1rem;
            font-size: 0.95rem;
            transition: all 0.2s ease;
            height: 52px;
        }

        .form-control:focus,
        .form-select:focus {
            background: var(--bg-card);
            border-color: var(--gold);
            box-shadow: 0 0 0 0.2rem var(--gold-dim);
            color: var(--text);
        }

        .form-control::placeholder {
            color: var(--text-dim);
        }

        .form-control:invalid,
        .form-select:invalid {
            border-color: var(--red-dim);
        }

        .invalid-feedback {
            color: var(--red);
            font-size: 0.85rem;
            margin-top: 0.25rem;
            background: var(--red-dim);
            padding: 0.375rem 0.75rem;
            border-radius: var(--radius-sm);
            border-left: 3px solid var(--red);
        }

        .btn-gold {
            background: linear-gradient(135deg, var(--gold) 0%, #b89442 100%);
            border: none;
            color: var(--bg-base) !important;
            border-radius: var(--radius-sm);
            font-weight: 600;
            padding: 0.875rem 1.75rem;
            transition: all 0.2s ease;
            box-shadow: 0 4px 15px var(--gold-dim);
            font-size: 0.9rem;
        }

        .btn-gold:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px var(--gold-mid);
            color: var(--bg-base) !important;
        }

        .btn-secondary-outline {
            background: transparent;
            border: 1px solid var(--border-light);
            color: var(--text);
            border-radius: var(--radius-sm);
            font-weight: 500;
            padding: 0.875rem 1.75rem;
            transition: all 0.2s ease;
            font-size: 0.9rem;
        }

        .btn-secondary-outline:hover {
            background: var(--bg-hover);
            border-color: var(--border);
            color: var(--text);
            transform: translateY(-1px);
        }

        .btn-back {
            background: transparent;
            border: 1px solid var(--border-light);
            color: var(--text-muted);
            border-radius: var(--radius-sm);
            font-weight: 500;
            padding: 0.5rem 1rem;
            font-size: 0.85rem;
            transition: all 0.2s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-back:hover {
            background: var(--bg-hover);
            color: var(--text);
            border-color: var(--border);
            transform: translateY(-1px);
        }

        .row>* {
            transition: transform 0.3s ease;
        }

        .row>*.fade-in {
            opacity: 0;
            transform: translateY(20px);
        }

        .row>*.fade-in.visible {
            opacity: 1;
            transform: translateY(0);
        }
    </style>

    <div class="container-fluid py-4">

        {{-- ALERTAS --}}
        @if(session('success'))
            <div class="alert d-flex align-items-center gap-2 mx-auto" style="max-width: 700px;">
                <i class="fas fa-check-circle"></i>
                {{ session('success') }}
            </div>
        @endif

        <div class="card form-card">

            {{-- HEADER --}}
            <div class="form-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h2 class="page-title d-flex align-items-center gap-2 mb-0">
                        <i class="fas fa-calendar-plus" style="font-size: 1.3rem;"></i>
                        Novo Agendamento
                    </h2>
                    <a href="{{ route('agendamentos.index') }}" class="btn-back">
                        <i class="fas fa-arrow-left"></i>
                        Voltar
                    </a>
                </div>
            </div>

            {{-- FORMULÁRIO --}}
            <div class="form-body">
                <form action="{{ route('agendamentos.store') }}" method="POST">
                    @csrf

                    <div class="row g-4">

                        {{-- CLIENTE --}}
                        <div class="col-12 fade-in delay-100">
                            <label class="form-label">
                                <i class="fas fa-user"></i> Cliente 
                            </label>
                            <select name="cliente_id" class="form-select @error('cliente_id') is-invalid @enderror"
                                required>
                                <option value="">Selecione um cliente</option>
                                @foreach($clientes as $cliente)
                                    <option value="{{ $cliente->id }}" {{ old('cliente_id') == $cliente->id ? 'selected' : '' }}>
                                        {{ $cliente->nome }}
                                    </option>
                                @endforeach
                            </select>
                            @error('cliente_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- BARBEIRO --}}
                        <div class="col-12 fade-in delay-200">
                            <label class="form-label">
                                <i class="fas fa-user-tie"></i> Barbeiro 
                            </label>
                            <select name="barbeiro_id" class="form-select @error('barbeiro_id') is-invalid @enderror"
                                required>
                                <option value="">Selecione um barbeiro</option>
                                @foreach($barbeiros as $barbeiro)
                                    <option value="{{ $barbeiro->id }}" {{ old('barbeiro_id') == $barbeiro->id ? 'selected' : '' }}>
                                        {{ $barbeiro->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('barbeiro_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- SERVIÇO --}}
                        <div class="col-12 fade-in delay-300">
                            <label class="form-label">
                                <i class="fas fa-scissors"></i> Serviço 
                            </label>
                            <select name="servico_id" class="form-select @error('servico_id') is-invalid @enderror"
                                required>
                                <option value="">Selecione um serviço</option>
                                @foreach($servicos as $servico)
                                    <option value="{{ $servico->id }}" {{ old('servico_id') == $servico->id ? 'selected' : '' }}>
                                        {{ $servico->nome }}
                                    </option>
                                @endforeach
                            </select>
                            @error('servico_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- INÍCIO --}}
                        <div class="col-md-6 fade-in delay-400">
                            <label class="form-label">
                                <i class="fas fa-clock"></i> Data/Hora Início 
                            </label>
                            <input type="datetime-local" name="data_hora_inicio" value="{{ old('data_hora_inicio') }}"
                                class="form-control @error('data_hora_inicio') is-invalid @enderror" required>
                            @error('data_hora_inicio')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- FIM --}}
                        <div class="col-md-6 fade-in delay-500">
                            <label class="form-label">
                                <i class="fas fa-stopwatch"></i> Data/Hora Fim 
                            </label>
                            <input type="datetime-local" name="data_hora_fim" value="{{ old('data_hora_fim') }}"
                                class="form-control @error('data_hora_fim') is-invalid @enderror" required>
                            @error('data_hora_fim')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- STATUS --}}
                        <div class="col-12 fade-in delay-600">
                            <label class="form-label">
                                <i class="fas fa-list-check"></i> Status
                            </label>
                            <select name="status" class="form-select @error('status') is-invalid @enderror">
                                <option value="agendado" {{ old('status') == 'agendado' ? 'selected' : '' }}>Agendado</option>
                                <option value="concluido" {{ old('status') == 'concluido' ? 'selected' : '' }}>Concluído
                                </option>
                                <option value="cancelado" {{ old('status') == 'cancelado' ? 'selected' : '' }}>Cancelado
                                </option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                    {{-- BOTÕES --}}
                    <div class="d-flex gap-3 mt-5 fade-in delay-700 justify-content-end">
                        <a href="{{ route('agendamentos.index') }}" class="btn btn-secondary-outline">
                            <i class="fas fa-times"></i> Cancelar
                        </a>
                        <button type="submit" class="btn btn-gold">
                            <i class="fas fa-save"></i> Agendar
                        </button>
                    </div>

                </form>
            </div>

        </div>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const fields = document.querySelectorAll('.fade-in');
            fields.forEach((field, index) => {
                setTimeout(() => {
                    field.classList.add('visible');
                }, index * 100);
            });
        });
    </script>
@endsection