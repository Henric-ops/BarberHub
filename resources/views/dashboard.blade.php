@extends('layouts.app')

@section('content')
    <div class="grid gap-6 lg:grid-cols-3">
        <div class="rounded-lg border border-slate-200 bg-white p-6 shadow-sm">
            <h2 class="text-xl font-semibold mb-2">Bem-vindo(a), {{ auth()->user()->name }}</h2>
            <p class="text-sm text-slate-600">Acesse o painel para gerenciar clientes, serviços e agendamentos.</p>
        </div>
        <div class="rounded-lg border border-slate-200 bg-white p-6 shadow-sm">
            <h3 class="text-lg font-semibold mb-2">Próximos passos</h3>
            <ul class="space-y-2 text-sm text-slate-700">
                <li><a href="{{ route('clientes.index') }}" class="text-slate-900 underline">Clientes</a></li>
                <li><a href="{{ route('servicos.index') }}" class="text-slate-900 underline">Serviços</a></li>
                <li><a href="{{ route('agendamentos.index') }}" class="text-slate-900 underline">Agendamentos</a></li>
            </ul>
        </div>
        <div class="rounded-lg border border-slate-200 bg-white p-6 shadow-sm">
            <h3 class="text-lg font-semibold mb-2">Acesso</h3>
            <p class="text-sm text-slate-700">Você está logado como <strong>{{ auth()->user()->cargo }}</strong>.</p>
        </div>
    </div>
@endsection
