@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/form.css') }}">
<div class="container-fluid py-4">
    <div class="card form-card">

        <!-- HEADER -->
        <div class="form-header">
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                <div>
                    <h2 class="form-title">
                        <i class="fas fa-scissors"></i>
                        Editar Serviço
                    </h2>
                    <p class="form-subtitle">
                        Atualize as informações do serviço.
                    </p>
                </div>

                <a href="{{ route('servicos.index') }}" class="btn btn-outline-light btn-sm">
                    <i class="fas fa-arrow-left"></i> Voltar
                </a>
            </div>
        </div>

        <!-- BODY -->
        <div class="form-body">
            <form method="POST" action="{{ route('servicos.update', $servico) }}">
                @csrf
                @method('PUT')

                <div class="form-field">
                    <label>Nome</label>
                    <input type="text" name="nome"
                        value="{{ old('nome', $servico->nome) }}"
                        required class="form-control form-control-lg">

                    @error('nome')
                        <div class="form-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-field">
                    <label>Descrição</label>
                    <textarea name="descricao" rows="3"
                        class="form-control">{{ old('descricao', $servico->descricao) }}</textarea>

                    @error('descricao')
                        <div class="form-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="form-field">
                            <label>Preço</label>
                            <input type="number" step="0.01" name="preco"
                                value="{{ old('preco', $servico->preco) }}"
                                required class="form-control">

                            @error('preco')
                                <div class="form-error">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-field">
                            <label>Duração (minutos)</label>
                            <input type="number" name="duracao_minutos"
                                value="{{ old('duracao_minutos', $servico->duracao_minutos) }}"
                                required class="form-control">

                            @error('duracao_minutos')
                                <div class="form-error">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- AÇÕES -->
                <div class="form-actions">
                    <button type="submit" class="btn btn-gold btn-lg">
                        <i class="fas fa-save"></i> Salvar alterações
                    </button>

                    <a href="{{ route('servicos.index') }}" class="btn btn-outline-light btn-lg">
                        <i class="fas fa-times"></i> Cancelar
                    </a>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection