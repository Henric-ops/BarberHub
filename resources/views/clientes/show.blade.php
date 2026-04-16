@extends('layouts.app')

@section('content')
    <div class="container-fluid py-4">
        <div class="panel p-4 shadow-sm mx-auto" style="max-width: 42rem;">
            <div class="d-flex flex-column flex-md-row align-items-start align-items-md-center justify-content-between gap-3 mb-4">
                <div>
                    <h1 class="h3 mb-1">Cliente</h1>
                    <p class="text-muted mb-0">Visualize os dados do cliente.</p>
                </div>
                <a href="{{ route('clientes.index') }}" class="btn btn-outline-secondary">Voltar</a>
            </div>

            <div class="row g-3 text-dark">
                <div class="col-12"><strong>Nome:</strong> {{ $cliente->nome }}</div>
                <div class="col-md-6"><strong>Telefone:</strong> {{ $cliente->telefone }}</div>
                <div class="col-md-6"><strong>CPF:</strong> {{ $cliente->cpf }}</div>
                <div class="col-md-6"><strong>E-mail:</strong> {{ $cliente->email }}</div>
                <div class="col-md-6"><strong>Endereço:</strong> {{ $cliente->endereco }}</div>
            </div>
        </div>
    </div>
@endsection
