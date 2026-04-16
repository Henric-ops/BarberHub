@extends('layouts.app')

@section('content')
    <div class="row g-4 align-items-stretch justify-content-center">
        <div class="col-12 col-lg-5">
            <div class="auth-hero p-5 h-100 d-flex flex-column justify-content-between">
                <div>
                    <span class="badge bg-white text-primary rounded-pill mb-4">Acesso seguro</span>
                    <h1 class="display-6 fw-semibold text-white mb-3">Bem-vindo ao BarberHub</h1>
                    <p class="mb-4">Controle sua barbearia com um painel elegante e eficiente. Entre com suas credenciais para continuar.</p>
                </div>
                <div>
                    <p class="mb-2 text-white-75">SaaS premium para gestores e equipes.</p>
                    <div class="d-flex gap-2 flex-wrap">
                        <span class="badge bg-white bg-opacity-15 text-white rounded-pill">Agenda</span>
                        <span class="badge bg-white bg-opacity-15 text-white rounded-pill">Clientes</span>
                        <span class="badge bg-white bg-opacity-15 text-white rounded-pill">Serviços</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-5">
            <div class="auth-card p-5 shadow-sm h-100">
                <div class="mb-4">
                    <p class="text-uppercase text-muted small mb-2">Entrar</p>
                    <h2 class="h4 mb-0">Acesse sua conta</h2>
                </div>

                <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate>
                    @csrf
                    <div class="mb-4">
                        <label class="form-label text-muted">E-mail</label>
                        <input type="email" name="email" value="{{ old('email') }}" required autofocus class="form-control form-control-lg rounded-4" placeholder="usuario@exemplo.com">
                    </div>
                    <div class="mb-4">
                        <label class="form-label text-muted">Senha</label>
                        <input type="password" name="password" required class="form-control form-control-lg rounded-4" placeholder="••••••••">
                    </div>
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="rememberMe">
                            <label class="form-check-label text-muted" for="rememberMe">Lembrar-me</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg w-100 rounded-4">Entrar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
