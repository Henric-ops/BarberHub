@extends('layouts.app')

@section('content')
    <div class="row gx-5 align-items-center justify-content-center">
        <div class="col-12 col-lg-10">
            <div class="card border-0 overflow-hidden shadow-lg" style="border-radius: 2rem;">
                <div class="row g-0">
                    <div class="col-12 col-md-6 bg-dark text-white p-5 d-flex flex-column justify-content-between" style="background: linear-gradient(145deg, #0f172a 0%, #111827 100%);">
                        <div>
                            <span class="badge rounded-pill bg-warning text-dark mb-4">Painel Login</span>
                            <h1 class="display-6 fw-semibold">Acesse sua barbearia com estilo.</h1>
                            <p class="text-secondary mt-3">Entre com seu usuário e senha para gerenciar clientes, agendamentos e serviços.</p>
                        </div>
                        <div class="row g-3 mt-4">
                            <div class="col-6">
                                <div class="p-4 rounded-4 bg-secondary bg-opacity-10">
                                    <small class="text-uppercase text-warning fw-bold">Administrador</small>
                                    <p class="mt-2 mb-0 text-muted">Use o admin para acessar todas as funções do sistema.</p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="p-4 rounded-4 bg-secondary bg-opacity-10">
                                    <small class="text-uppercase text-info fw-bold">Funcionário</small>
                                    <p class="mt-2 mb-0 text-muted">Barbeiros acessam sua agenda e atualizam atendimentos.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 p-5 bg-white">
                        <div class="mb-4">
                            <p class="text-uppercase text-muted small mb-1">Entrar</p>
                            <h2 class="h3 fw-semibold mb-0">Login no sistema</h2>
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
                            <button type="submit" class="btn btn-warning btn-lg w-100 rounded-4 fw-semibold">Entrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
