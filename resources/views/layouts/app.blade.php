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

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

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
                        <span class="sidebar-icon">
                            <i class="fas fa-chart-line"></i>
                        </span>
                        Dashboard
                    </a>

                    @if(auth()->user()->isAdministrador())
                        {{-- NAVEGAÇÃO DO ADMINISTRADOR --}}
                        <a href="{{ route('agendamentos.index') }}" class="nav-link d-flex align-items-center gap-2 {{ str_starts_with($current, 'agendamentos') ? 'active' : '' }}">
                            <span class="sidebar-icon">
                                <i class="fas fa-calendar-alt"></i>
                            </span>
                            Agendamentos
                        </a>

                        <a href="{{ route('clientes.index') }}" class="nav-link d-flex align-items-center gap-2 {{ str_starts_with($current, 'clientes') ? 'active' : '' }}">
                            <span class="sidebar-icon" style="background: rgba(5, 150, 105, 0.12); color: #059669;">
                                <i class="fas fa-users"></i>
                            </span>
                            Clientes
                        </a>

                        <a href="{{ route('barbeiros.index') }}" class="nav-link d-flex align-items-center gap-2 {{ str_starts_with($current, 'barbeiros') ? 'active' : '' }}">
                            <span class="sidebar-icon" style="background: rgba(37, 99, 235, 0.12); color: #2563EB;">
                                <i class="fas fa-user-tie"></i>
                            </span>
                            Barbeiros
                        </a>

                        <a href="{{ route('servicos.index') }}" class="nav-link d-flex align-items-center gap-2 {{ str_starts_with($current, 'servicos') ? 'active' : '' }}">
                            <span class="sidebar-icon">
                                <i class="fas fa-scissors"></i>
                            </span>
                            Serviços
                        </a>

                    @else
                        {{-- NAVEGAÇÃO DO BARBEIRO --}}
                        <a href="{{ route('agendamentos.index') }}" class="nav-link d-flex align-items-center gap-2 {{ str_starts_with($current, 'agendamentos') ? 'active' : '' }}">
                            <span class="sidebar-icon">
                                <i class="fas fa-calendar-alt"></i>
                            </span>
                            Meus Agendamentos
                        </a>
                    @endif
                </nav>

                <div class="mt-auto pt-4">
                    <div class="panel p-4 mb-3">
                        <p class="text-uppercase small text-muted mb-2">Resumo rápido</p>
                        <p class="mb-0">Mantenha a barbearia organizada com navegação direta e controle visual.</p>
                    </div>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-danger w-100">
                            <i class="fas fa-sign-out-alt"></i> Sair
                        </button>
                    </form>
                </div>
            </aside>

            <div class="flex-grow-1 d-flex flex-column">
                <header class="topbar px-4 py-3 d-flex flex-column flex-md-row align-items-start align-items-md-center justify-content-between gap-3">
                    <div>
                        <h1 class="h5 mb-1">
                            @if(auth()->user()->isAdministrador())
                                {{ $title ?? 'Painel Administrativo' }}
                            @else
                                {{ $title ?? 'Meus Agendamentos' }}
                            @endif
                        </h1>
                        <p class="text-muted mb-0">
                            @if(auth()->user()->isAdministrador())
                                Controle os agendamentos, clientes e serviços em um só lugar.
                            @else
                                Visualize e gerencie seus agendamentos como barbeiro.
                            @endif
                        </p>
                    </div>

                    @if(auth()->user()->isAdministrador())
                        <div class="d-flex flex-wrap gap-2">
                            <a href="{{ route('agendamentos.create') }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-plus"></i> Novo agendamento
                            </a>

                            <a href="{{ route('clientes.index') }}" class="btn btn-outline-secondary btn-sm">
                                <i class="fas fa-users"></i> Clientes
                            </a>
                        </div>
                    @endif
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