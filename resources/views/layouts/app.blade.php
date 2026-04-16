<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'BarberHub') }}</title>
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @endif
</head>
<body class="bg-gray-100 text-slate-900 min-h-screen">
    <div class="min-h-screen bg-white shadow-sm">
        <header class="bg-[#1b1b18] text-white">
            <div class="max-w-7xl mx-auto px-4 py-4 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                <div>
                    <a href="{{ route('dashboard') }}" class="font-semibold text-lg">BarberHub</a>
                    <p class="text-sm text-gray-300">Gerencie agendamentos, clientes e serviços.</p>
                </div>
                @auth
                    <nav class="flex flex-wrap items-center gap-2">
                        <a href="{{ route('dashboard') }}" class="px-3 py-2 rounded bg-gray-800 text-white text-sm">Dashboard</a>
                        <a href="{{ route('clientes.index') }}" class="px-3 py-2 rounded bg-gray-800 text-white text-sm">Clientes</a>
                        <a href="{{ route('servicos.index') }}" class="px-3 py-2 rounded bg-gray-800 text-white text-sm">Serviços</a>
                        <a href="{{ route('agendamentos.index') }}" class="px-3 py-2 rounded bg-gray-800 text-white text-sm">Agendamentos</a>
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="px-3 py-2 rounded bg-red-600 text-white text-sm">Sair</button>
                        </form>
                    </nav>
                @endauth
            </div>
        </header>

        <main class="max-w-7xl mx-auto px-4 py-8">
            @if (session('success'))
                <div class="mb-6 rounded border border-green-300 bg-green-50 p-4 text-green-800">
                    {{ session('success') }}
                </div>
            @endif
            @if ($errors->any())
                <div class="mb-6 rounded border border-red-300 bg-red-50 p-4 text-red-800">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @yield('content')
        </main>
    </div>
</body>
</html>
