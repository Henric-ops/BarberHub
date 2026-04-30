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
                        <i class="fas fa-user-plus"></i>
                        Novo Cliente
                    </h2>
                    <p class="form-subtitle">
                        Cadastre um novo cliente
                    </p>
                </div>

                <a href="{{ route('clientes.index') }}" class="btn btn-outline-light btn-sm">
                    <i class="fas fa-arrow-left"></i> Voltar
                </a>
            </div>
        </div>

        <!-- BODY -->
        <div class="form-body">
            <form method="POST" action="{{ route('clientes.store') }}">
                @csrf

                <!-- NOME -->
                <div class="form-group-custom">
                    <label>Nome</label>
                    <input type="text"
                        name="nome"
                        value="{{ old('nome') }}"
                        required
                        class="form-control"
                        placeholder="Nome completo">

                    @error('nome')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <!-- TELEFONE + CPF -->
                <div class="row">
                    <div class="col-md-6 form-group-custom">
                        <label>Telefone</label>
                        <input type="text"
                            name="telefone"
                            value="{{ old('telefone') }}"
                            required
                            class="form-control"
                            placeholder="(11) 98765-4321">

                        @error('telefone')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 form-group-custom">
                        <label>CPF</label>
                        <input type="text"
                            name="cpf"
                            value="{{ old('cpf') }}"
                            required
                            class="form-control"
                            placeholder="000.000.000-00">

                        @error('cpf')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- EMAIL + ENDEREÇO -->
                <div class="row">
                    <div class="col-md-6 form-group-custom">
                        <label>E-mail</label>
                        <input type="email"
                            name="email"
                            value="{{ old('email') }}"
                            class="form-control"
                            placeholder="email@email.com">

                        @error('email')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 form-group-custom">
                        <label>Endereço</label>
                        <input type="text"
                            name="endereco"
                            value="{{ old('endereco') }}"
                            class="form-control"
                            placeholder="Rua, número, cidade">

                        @error('endereco')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- ACTIONS -->
                <div class="form-actions">
                    <button type="submit" class="btn btn-gold">
                        <i class="fas fa-save"></i> Salvar cliente
                    </button>

                    <a href="{{ route('clientes.index') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-times"></i> Cancelar
                    </a>
                </div>

            </form>
        </div>
    </div>

</div>
@endsection