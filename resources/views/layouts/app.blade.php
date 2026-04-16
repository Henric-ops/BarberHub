<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'BarberHub') }}</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <!-- Vite (CSS e JS do projeto) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-vh-100">
    @auth
        @php $current = Route::currentRouteName(); @endphp

        <div class="d-flex min-vh-100">
            <aside class="sidebar d-flex flex-column p-4">
                <a href="{{ route('dashboard') }}" class="d-flex align-items-center text-decoration-none mb-5">
                    <div class="brand-badge me-3">B</div>
                    <div>
                        <h2 class="h5 mb-1 text-dark">BarberHub</h2>
                        <p class="text-muted small mb-0">Painel de gestão</p>
                    </div>
                </a>

                <nav class="nav nav-pills flex-column gap-2">
                    <a href="{{ route('dashboard') }}" class="nav-link d-flex align-items-center gap-2 {{ $current === 'dashboard' ? 'active' : '' }}">
                        <span class="d-inline-flex align-items-center justify-content-center rounded-3" style="width: 36px; height: 36px; background: rgba(37, 99, 235, 0.08);">
                            <i class="fas fa-chart-line text-primary"></i>
                        </span>
                        Dashboard
                    </a>

                    <a href="{{ route('agendamentos.index') }}" class="nav-link d-flex align-items-center gap-2 {{ str_starts_with($current, 'agendamentos') ? 'active' : '' }}">
                        <span class="d-inline-flex align-items-center justify-content-center rounded-3" style="width: 36px; height: 36px; background: rgba(37, 99, 235, 0.08);">
                            <i class="fas fa-calendar-alt text-primary"></i>
                        </span>
                        Agendamentos
                    </a>

                    <a href="{{ route('clientes.index') }}" class="nav-link d-flex align-items-center gap-2 {{ str_starts_with($current, 'clientes') ? 'active' : '' }}">
                        <span class="d-inline-flex align-items-center justify-content-center rounded-3" style="width: 36px; height: 36px; background: rgba(16, 185, 129, 0.12);">
                            <i class="fas fa-users text-success"></i>
                        </span>
                        Clientes
                    </a>

                    <a href="{{ route('servicos.index') }}" class="nav-link d-flex align-items-center gap-2 {{ str_starts_with($current, 'servicos') ? 'active' : '' }}">
                        <span class="d-inline-flex align-items-center justify-content-center rounded-3" style="width: 36px; height: 36px; background: rgba(37, 99, 235, 0.08);">
                            <i class="fas fa-scissors text-primary"></i>
                        </span>
                        Serviços
                    </a>
                </nav>

                <div class="mt-auto pt-4">
                    <div class="panel p-4 mb-3">
                        <p class="text-uppercase small text-muted mb-2">Resumo rápido</p>
                        <p class="mb-0">Mantenha a barbearia organizada com navegação direta e controle visual.</p>
                    </div>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-outline-secondary w-100">
                            <i class="fas fa-sign-out-alt me-1"></i> Sair
                        </button>
                    </form>
                </div>
            </aside>

            <div class="flex-grow-1 d-flex flex-column">
                <header class="topbar px-4 py-3 d-flex flex-column flex-md-row align-items-start align-items-md-center justify-content-between gap-3">
                    <div>
                        <h1 class="h5 mb-1">{{ $title ?? 'Visão geral' }}</h1>
                        <p class="text-muted mb-0">Controle os agendamentos, clientes e serviços em um só lugar.</p>
                    </div>

                    <div class="d-flex flex-wrap gap-2">
                        <a href="{{ route('agendamentos.create') }}" class="btn btn-primary btn-sm rounded-pill">
                            <i class="fas fa-plus me-1"></i> Novo agendamento
                        </a>

                        <a href="{{ route('clientes.index') }}" class="btn btn-outline-secondary btn-sm rounded-pill">
                            <i class="fas fa-users me-1"></i> Clientes
                        </a>
                    </div>
                </header>

                <main class="p-4 p-xl-5">
                    @if (session('success'))
                        <div class="alert alert-success border-0 rounded-4 shadow-sm">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger border-0 rounded-4 shadow-sm">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @yield('content')
                </main>
            </div>
        </div>
    @else
        <main class="min-vh-100 d-flex align-items-center justify-content-center p-4" style="background: var(--color-background);">
            <div class="w-100" style="max-width: 1100px;">
                @yield('content')
            </div>
        </main>
    @endauth

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>