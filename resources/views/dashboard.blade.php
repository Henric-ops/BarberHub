@extends('layouts.app')

@section('content')
    <div class="grid gap-6 xl:grid-cols-[1.4fr_1fr]">
        <section class="space-y-6">
            <div class="rounded-[2rem] border border-white/10 bg-slate-900/80 p-8 shadow-[0_50px_120px_rgba(15,23,42,0.45)]">
                <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
                    <div>
                        <p class="text-sm uppercase tracking-[0.25em] text-slate-400">Olá, {{ auth()->user()->name }}</p>
                        <h1 class="mt-3 text-3xl font-semibold text-white">Painel principal</h1>
                        <p class="mt-2 max-w-2xl text-slate-400">Acompanhe os últimos dados da barbearia com um visual leve, moderno e organizado.</p>
                    </div>
                    <div class="inline-flex items-center gap-2 rounded-3xl bg-white/5 px-5 py-3 text-sm text-slate-200 shadow-inner shadow-white/5">
                        <span class="inline-flex h-10 w-10 items-center justify-center rounded-2xl bg-gradient-to-br from-amber-500 to-orange-500 text-slate-950">!</span>
                        Atualizado agora
                    </div>
                </div>
            </div>

            <div class="grid gap-6 sm:grid-cols-2 xl:grid-cols-3">
                <div class="rounded-[2rem] bg-gradient-to-br from-slate-900 to-slate-800 p-6 shadow-[0_30px_60px_rgba(15,23,42,0.35)]">
                    <div class="flex items-center justify-between">
                        <span class="text-sm uppercase tracking-[0.24em] text-slate-400">Agendamentos</span>
                        <span class="inline-flex h-11 w-11 items-center justify-center rounded-2xl bg-cyan-500/15 text-cyan-300">
                            <svg viewBox="0 0 24 24" fill="none" class="h-5 w-5"><path d="M4 4h16M4 8h16M7 13h10M7 17h6" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>
                        </span>
                    </div>
                    <p class="mt-8 text-4xl font-semibold text-white">{{ $agendamentosCount }}</p>
                    <p class="mt-2 text-sm text-slate-400">Total de agendamentos registrados.</p>
                </div>

                <div class="rounded-[2rem] bg-gradient-to-br from-slate-900 to-slate-800 p-6 shadow-[0_30px_60px_rgba(15,23,42,0.35)]">
                    <div class="flex items-center justify-between">
                        <span class="text-sm uppercase tracking-[0.24em] text-slate-400">Clientes</span>
                        <span class="inline-flex h-11 w-11 items-center justify-center rounded-2xl bg-emerald-500/15 text-emerald-300">
                            <svg viewBox="0 0 24 24" fill="none" class="h-5 w-5"><path d="M12 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8Zm-6 9a6 6 0 0 1 12 0" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        </span>
                    </div>
                    <p class="mt-8 text-4xl font-semibold text-white">{{ $clientesCount }}</p>
                    <p class="mt-2 text-sm text-slate-400">Clientes cadastrados no sistema.</p>
                </div>

                <div class="rounded-[2rem] bg-gradient-to-br from-slate-900 to-slate-800 p-6 shadow-[0_30px_60px_rgba(15,23,42,0.35)]">
                    <div class="flex items-center justify-between">
                        <span class="text-sm uppercase tracking-[0.24em] text-slate-400">Serviços</span>
                        <span class="inline-flex h-11 w-11 items-center justify-center rounded-2xl bg-pink-500/15 text-pink-300">
                            <svg viewBox="0 0 24 24" fill="none" class="h-5 w-5"><path d="M12 3v18M3 12h18" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>
                        </span>
                    </div>
                    <p class="mt-8 text-4xl font-semibold text-white">{{ $servicosCount }}</p>
                    <p class="mt-2 text-sm text-slate-400">Serviços disponíveis para agendamento.</p>
                </div>
            </div>

            <div class="rounded-[2rem] border border-white/10 bg-slate-900/80 p-6 shadow-[0_40px_80px_rgba(15,23,42,0.25)]">
                <div class="flex items-center justify-between gap-4">
                    <div>
                        <h2 class="text-xl font-semibold text-white">Visão geral</h2>
                        <p class="mt-2 text-sm text-slate-400">Acompanhe os dados mais importantes do seu negócio.</p>
                    </div>
                    <span class="inline-flex rounded-full bg-slate-800 px-3 py-1 text-xs uppercase tracking-[0.24em] text-slate-300">Resumo</span>
                </div>
                <div class="mt-6 grid gap-4 sm:grid-cols-3">
                    <div class="rounded-3xl border border-white/10 bg-slate-950/80 p-5 text-slate-100">
                        <p class="text-sm text-slate-400">Atendimento ativo</p>
                        <p class="mt-4 text-2xl font-semibold">3</p>
                    </div>
                    <div class="rounded-3xl border border-white/10 bg-slate-950/80 p-5 text-slate-100">
                        <p class="text-sm text-slate-400">Faturamento atual</p>
                        <p class="mt-4 text-2xl font-semibold">R$ 1.717,98</p>
                    </div>
                    <div class="rounded-3xl border border-white/10 bg-slate-950/80 p-5 text-slate-100">
                        <p class="text-sm text-slate-400">Agenda liberada</p>
                        <p class="mt-4 text-2xl font-semibold">Sim</p>
                    </div>
                </div>
            </div>
        </section>

        <aside class="space-y-6">
            <div class="rounded-[2rem] border border-white/10 bg-slate-900/80 p-6 shadow-[0_30px_60px_rgba(15,23,42,0.35)]">
                <div class="flex items-center justify-between gap-4">
                    <div>
                        <p class="text-sm uppercase tracking-[0.25em] text-slate-400">Serviços mais realizados</p>
                        <h2 class="mt-3 text-xl font-semibold text-white">Ranking</h2>
                    </div>
                    <span class="rounded-full bg-slate-800 px-3 py-1 text-xs uppercase tracking-[0.24em] text-slate-300">Mês</span>
                </div>

                <div class="mt-6 space-y-5">
                    <div>
                        <div class="flex items-center justify-between text-sm text-slate-300">
                            <span>Corte de Cabelo</span>
                            <span>R$ 200,00</span>
                        </div>
                        <div class="mt-3 h-2 overflow-hidden rounded-full bg-white/5">
                            <div class="h-full w-4/5 rounded-full bg-amber-500"></div>
                        </div>
                    </div>
                    <div>
                        <div class="flex items-center justify-between text-sm text-slate-300">
                            <span>Limpeza de Barba</span>
                            <span>R$ 45,00</span>
                        </div>
                        <div class="mt-3 h-2 overflow-hidden rounded-full bg-white/5">
                            <div class="h-full w-2/5 rounded-full bg-cyan-400"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="rounded-[2rem] border border-white/10 bg-slate-900/80 p-6 shadow-[0_30px_60px_rgba(15,23,42,0.35)]">
                <p class="text-sm uppercase tracking-[0.25em] text-slate-400">Link rápido</p>
                <h2 class="mt-3 text-xl font-semibold text-white">Ações</h2>
                <div class="mt-6 space-y-3">
                    <a href="{{ route('agendamentos.create') }}" class="flex items-center justify-between rounded-3xl bg-gradient-to-r from-amber-500 to-orange-500 px-4 py-4 text-sm font-semibold text-slate-950 shadow-lg shadow-amber-500/20 transition hover:brightness-110">
                        <span>Novo agendamento</span>
                        <svg viewBox="0 0 24 24" fill="none" class="h-5 w-5"><path d="M12 5v14M5 12h14" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>
                    </a>
                    <a href="{{ route('clientes.index') }}" class="block rounded-3xl border border-white/10 bg-slate-950/80 px-4 py-4 text-sm text-slate-200 transition hover:border-slate-300/40 hover:bg-slate-900">Gerenciar clientes</a>
                </div>
            </div>
        </aside>
    </div>
@endsection
