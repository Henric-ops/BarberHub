@extends('layouts.app')

@section('content')
    <div class="container-fluid py-4">
        <div class="card rounded-lg shadow-md" style="max-width: 600px; margin: 0 auto;">
            <div class="p-4 border-bottom" style="background: linear-gradient(135deg, #2563EB 0%, #3B82F6 100%); color: #fff;">
                <div class="d-flex flex-column flex-md-row align-items-start align-items-md-center justify-content-between gap-3">
                    <div class="slide-in-left">
                        <h2 class="h3 mb-1 d-flex align-items-center gap-2" style="color: #fff;">
                            <i class="fas fa-user-tie"></i>
                            Novo Barbeiro
                        </h2>
                        <p class="mb-0" style="color: rgba(255, 255, 255, 0.9);">Cadastre um novo barbeiro para a barbearia.</p>
                    </div>
                    <a href="{{ route('barbeiros.index') }}" class="btn btn-outline-light">
                        <i class="fas fa-arrow-left"></i> Voltar
                    </a>
                </div>
            </div>

            <div class="p-4 p-md-5">
                <form method="POST" action="{{ route('barbeiros.store') }}">
                    @csrf

                    <div class="form-group mb-4 fade-in delay-100">
                        <label class="form-label">
                            <i class="fas fa-user" style="color: #2563EB;"></i> Nome
                        </label>
                        <input type="text" name="name" value="{{ old('name') }}" required class="form-control form-control-lg rounded-lg" placeholder="Nome completo" />
                        @error('name')
                            <div class="invalid-feedback d-block">
                                <i class="fas fa-exclamation-circle"></i> {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group mb-4 fade-in delay-200">
                        <label class="form-label">
                            <i class="fas fa-envelope" style="color: #059669;"></i> E-mail
                        </label>
                        <input type="email" name="email" value="{{ old('email') }}" required class="form-control form-control-lg rounded-lg" placeholder="seu@email.com" />
                        @error('email')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-4 fade-in delay-300">
                        <label class="form-label">
                            <i class="fas fa-phone" style="color: #F97316;"></i> Telefone
                        </label>
                        <input type="text" name="telefone" value="{{ old('telefone') }}" class="form-control rounded-lg" placeholder="(11) 98765-4321" />
                        @error('telefone')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-4 fade-in delay-400">
                        <label class="form-label">
                            <i class="fas fa-lock" style="color: #DC2626;"></i> Senha
                        </label>
                        <input type="password" name="password" required class="form-control form-control-lg rounded-lg" placeholder="Mínimo 6 caracteres" />
                        @error('password')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-5 fade-in delay-500">
                        <label class="form-label">
                            <i class="fas fa-check-circle" style="color: #059669;"></i> Confirme a Senha
                        </label>
                        <input type="password" name="password_confirmation" required class="form-control form-control-lg rounded-lg" placeholder="Repita a senha" />
                        @error('password_confirmation')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex gap-2 fade-in delay-600">
                        <button type="submit" class="btn btn-primary btn-lg">
                            <i class="fas fa-save"></i> Cadastrar Barbeiro
                        </button>
                        <a href="{{ route('barbeiros.index') }}" class="btn btn-outline-secondary btn-lg">
                            <i class="fas fa-times"></i> Cancelar
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
