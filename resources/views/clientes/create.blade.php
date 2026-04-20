@extends('layouts.app')

@section('content')
    <div class="container-fluid py-4">
        <div class="card rounded-lg shadow-md">
            <div class="p-4 border-bottom" style="background: linear-gradient(135deg, #059669 0%, #10B981 100%); color: #fff;">
                <div class="d-flex flex-column flex-md-row align-items-start align-items-md-center justify-content-between gap-3">
                    <div class="slide-in-left">
                        <h2 class="h3 mb-1 d-flex align-items-center gap-2" style="color: #fff;">
                            <i class="fas fa-user-plus"></i>
                            Novo Cliente
                        </h2>
                        <p class="mb-0" style="color: rgba(255, 255, 255, 0.9);">Cadastre um novo cliente para agendamentos.</p>
                    </div>
                    <a href="{{ route('clientes.index') }}" class="btn btn-outline-light">
                        <i class="fas fa-arrow-left"></i> Voltar
                    </a>
                </div>
            </div>

            <div class="p-4 p-md-5">
                <form method="POST" action="{{ route('clientes.store') }}">
                    @csrf
                    <div class="form-group mb-4 fade-in delay-100">
                        <label class="form-label">Nome</label>
                        <input type="text" name="nome" value="{{ old('nome') }}" required class="form-control form-control-lg rounded-lg" placeholder="Nome completo" />
                        @error('nome')
                            <div class="invalid-feedback d-block">
                                <i class="fas fa-exclamation-circle"></i> {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="row g-3 mb-4 fade-in delay-200">
                        <div class="col-md-6">
                            <label class="form-label">Telefone</label>
                            <input type="text" name="telefone" value="{{ old('telefone') }}" required class="form-control rounded-lg" placeholder="(11) 98765-4321" />
                            @error('telefone')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">CPF</label>
                            <input type="text" name="cpf" value="{{ old('cpf') }}" required class="form-control rounded-lg" placeholder="000.000.000-00" />
                            @error('cpf')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row g-3 mb-5 fade-in delay-300">
                        <div class="col-md-6">
                            <label class="form-label">E-mail</label>
                            <input type="email" name="email" value="{{ old('email') }}" class="form-control rounded-lg" placeholder="email@example.com" />
                            @error('email')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Endereço</label>
                            <input type="text" name="endereco" value="{{ old('endereco') }}" class="form-control rounded-lg" placeholder="Rua, número, cidade" />
                            @error('endereco')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="d-flex gap-2 fade-in delay-400">
                        <button type="submit" class="btn btn-primary btn-lg">
                            <i class="fas fa-save"></i> Salvar cliente
                        </button>
                        <a href="{{ route('clientes.index') }}" class="btn btn-outline-secondary btn-lg">
                            <i class="fas fa-times"></i> Cancelar
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
