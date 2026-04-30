@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="{{ asset('css/form.css') }}">
<div class="container-fluid py-4">

    <div class="form-container" style="max-width: 700px; margin: 0 auto;">

        <!-- HEADER -->
        <div class="form-header">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h2 class="form-title">
                        <i class="fas fa-scissors"></i>
                        Novo Serviço
                    </h2>
                    <p class="form-subtitle">
                        Cadastre um novo serviço
                    </p>
                </div>

                <a href="{{ route('servicos.index') }}" class="btn btn-outline-light btn-sm">
                    <i class="fas fa-arrow-left"></i> Voltar
                </a>
            </div>
        </div>

        <!-- BODY -->
        <div class="form-body">
            <form method="POST" action="{{ route('servicos.store') }}">
                @csrf

                <!-- NOME -->
                <div class="form-group-custom">
                    <label>Nome</label>
                    <input type="text"
                        name="nome"
                        value="{{ old('nome') }}"
                        required
                        class="form-control"
                        placeholder="Nome do serviço">

                    @error('nome')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <!-- DESCRIÇÃO -->
                <div class="form-group-custom">
                    <label>Descrição</label>
                    <textarea
                        name="descricao"
                        rows="3"
                        class="form-control"
                        placeholder="Descrição do serviço">{{ old('descricao') }}</textarea>

                    @error('descricao')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <!-- PREÇO + DURAÇÃO -->
                <div class="row">
                    <div class="col-md-6 form-group-custom">
                        <label>Preço</label>
                        <input type="number"
                            step="0.01"
                            name="preco"
                            value="{{ old('preco') }}"
                            required
                            class="form-control"
                            placeholder="0.00">

                        @error('preco')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 form-group-custom">
                        <label>Duração (minutos)</label>
                        <input type="number"
                            name="duracao_minutos"
                            value="{{ old('duracao_minutos') }}"
                            required
                            class="form-control"
                            placeholder="30">

                        @error('duracao_minutos')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- ACTIONS -->
                <div class="form-actions">
                    <button type="submit" class="btn btn-gold">
                        <i class="fas fa-save"></i> Salvar serviço
                    </button>

                    <a href="{{ route('servicos.index') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-times"></i> Cancelar
                    </a>
                </div>

            </form>
        </div>
    </div>

</div>
@endsection