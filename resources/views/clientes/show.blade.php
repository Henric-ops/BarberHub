@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto rounded-lg border border-slate-200 bg-white p-6 shadow-sm">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h1 class="text-2xl font-semibold">Cliente</h1>
                <p class="text-sm text-slate-600">Visualize os dados do cliente.</p>
            </div>
            <a href="{{ route('clientes.index') }}" class="rounded bg-slate-800 px-4 py-2 text-white">Voltar</a>
        </div>

        <div class="space-y-4 text-slate-700">
            <p><strong>Nome:</strong> {{ $cliente->nome }}</p>
            <p><strong>Telefone:</strong> {{ $cliente->telefone }}</p>
            <p><strong>CPF:</strong> {{ $cliente->cpf }}</p>
            <p><strong>E-mail:</strong> {{ $cliente->email }}</p>
            <p><strong>Endereço:</strong> {{ $cliente->endereco }}</p>
        </div>
    </div>
@endsection
