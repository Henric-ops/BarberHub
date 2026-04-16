<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'BarberHub') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ENjdO4Dr2bkBIFxQpeoYkM4fFZ9E+6cAibvZyC7Y5pxFsmP1l4l9X+Xut6K0ybgF" crossorigin="anonymous">
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @endif
</head>
<body class="bg-slate-950 text-slate-100 min-h-screen">
    @auth
        <div class="lg:flex lg:min-h-screen">
            <aside class="w-full lg:w-80 bg-[#111827] border-r border-white/10 text-slate-100 flex flex-col">
                <div class="px-6 py-5 border-b border-white/10">
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-3">
                        <span class="inline-flex h-10 w-10 items-center justify-center rounded-2xl bg-gradient-to-br from-amber-500 to-orange-500 text-slate-950 shadow-lg shadow-amber-500/20">B</span>
                        <div>
                            <span class="block text-lg font-semibold">BarberHub</span>
                            <span class="block text-xs text-slate-400">Painel administrativo</span>
                        </div>
                    </a>
                </div>

                <nav class="flex-1 px-4 py-6 space-y-2">
                    @php
                        $current = Route::currentRouteName();
                    @endphp

                    <a href="{{ route('dashboard') }}" class="group flex items-center gap-3 rounded-2xl px-4 py-3 transition hover:bg-white/5 {{ $current === 'dashboard' ? 'bg-white/10' : 'bg-transparent' }}">
                        <span class="inline-flex h-11 w-11 items-center justify-center rounded-2xl bg-slate-800 text-amber-400 group-hover:bg-amber-500/15">
                            <svg viewBox="0 0 24 24" fill="none" class="h-5 w-5"><path d="M3 13h8V3H3v10Zm0 8h8v-6H3v6Zm10 0h8v-10h-8v10Zm0-18v6h8V3h-8Z" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        </span>
                        <span class="text-sm font-medium text-slate-100">Dashboard</span>
                    </a>

                    <a href="{{ route('agendamentos.index') }}" class="group flex items-center gap-3 rounded-2xl px-4 py-3 transition hover:bg-white/5 {{ str_starts_with($current, 'agendamentos') ? 'bg-white/10' : 'bg-transparent' }}">
                        <span class="inline-flex h-11 w-11 items-center justify-center rounded-2xl bg-slate-800 text-cyan-400 group-hover:bg-cyan-500/15">
                            <svg viewBox="0 0 24 24" fill="none" class="h-5 w-5"><path d="M4 4h16M4 8h16M7 13h10M7 17h6" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>
                        </span>
                        <span class="text-sm font-medium text-slate-100">Agendamentos</span>
                    </a>

                    <a href="{{ route('clientes.index') }}" class="group flex items-center gap-3 rounded-2xl px-4 py-3 transition hover:bg-white/5 {{ str_starts_with($current, 'clientes') ? 'bg-white/10' : 'bg-transparent' }}">
                        <span class="inline-flex h-11 w-11 items-center justify-center rounded-2xl bg-slate-800 text-emerald-400 group-hover:bg-emerald-500/15">
                            <svg viewBox="0 0 24 24" fill="none" class="h-5 w-5"><path d="M12 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8Zm-6 9a6 6 0 0 1 12 0" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        </span>
                        <span class="text-sm font-medium text-slate-100">Clientes</span>
                    </a>

                    <a href="{{ route('servicos.index') }}" class="group flex items-center gap-3 rounded-2xl px-4 py-3 transition hover:bg-white/5 {{ str_starts_with($current, 'servicos') ? 'bg-white/10' : 'bg-transparent' }}">
                        <span class="inline-flex h-11 w-11 items-center justify-center rounded-2xl bg-slate-800 text-pink-400 group-hover:bg-pink-500/15">
                            <svg viewBox="0 0 24 24" fill="none" class="h-5 w-5"><path d="M12 3v18M3 12h18" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>
                        </span>
                        <span class="text-sm font-medium text-slate-100">Serviços</span>
                    </a>
                </nav>

                <div class="px-4 pb-6 pt-4 border-t border-white/10">
                    <div class="rounded-3xl border border-white/10 bg-white/5 p-4 shadow-[0_20px_50px_rgba(0,0,0,0.12)]">
                        <div class="flex items-center gap-3">
                            <div class="h-12 w-12 rounded-2xl bg-gradient-to-br from-amber-500 to-orange-500 text-slate-950 flex items-center justify-center font-semibold">{{ strtoupper(substr(auth()->user()->name,0,1)) }}</div>
                            <div>
                                <p class="text-sm font-semibold">{{ auth()->user()->name }}</p>
                                <p class="text-xs text-slate-400 capitalize">{{ auth()->user()->cargo }}</p>
                            </div>
                        </div>
                        <div class="mt-4 flex gap-2">
                            <form method="POST" action="{{ route('logout') }}" class="w-full">
                                @csrf
                                <button type="submit" class="w-full rounded-2xl bg-amber-500 px-4 py-2 text-sm font-semibold text-slate-950 transition hover:bg-amber-400">Sair</button>
                            </form>
                        </div>
                    </div>
                </div>
            </aside>

            <main class="flex-1 bg-slate-950 text-slate-100">
                <div class="border-b border-white/10 bg-slate-950/95 backdrop-blur-xl sticky top-0 z-20">
                    <div class="max-w-7xl mx-auto px-4 py-4 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                        <div>
                            <h1 class="text-xl font-semibold tracking-tight">{{ $title ?? 'Visão geral' }}</h1>
                            <p class="text-sm text-slate-400">Um painel limpo para acompanhar sua barbearia com estilo.</p>
                        </div>
                        <div class="flex flex-wrap items-center gap-3">
                            <div class="inline-flex items-center gap-2 rounded-2xl bg-white/5 px-4 py-2 text-sm text-slate-200 shadow-sm">
                                <svg viewBox="0 0 24 24" fill="none" class="h-4 w-4 text-amber-300"><path d="M12 6v6l4 2" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                <span>Atualizado agora</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="max-w-7xl mx-auto px-4 py-8">
                    @if (session('success'))
                        <div class="mb-6 rounded-3xl border border-emerald-500/20 bg-emerald-500/10 p-4 text-emerald-100 shadow-sm">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="mb-6 rounded-3xl border border-red-500/20 bg-red-500/10 p-4 text-red-100 shadow-sm">
                            <ul class="list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @yield('content')
                </div>
            </main>
        </div>
    @else
        <main class="min-h-screen bg-slate-950 flex items-center justify-center px-4 py-10">
            <div class="w-full max-w-4xl">
                @yield('content')
            </div>
        </main>
    @endauth
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6LJj+7GMrGf0nX6dI1QuRr53P5j5owd7E6Itx8v+QvZ6jIW3" crossorigin="anonymous"></script>
</body>
</html>
