@extends('layouts.app')

@section('content')
    <div class="container-fluid py-4">
        <div class="card rounded-lg shadow-md" style="max-width: 600px; margin: 0 auto;">
            <div class="p-4 border-bottom" style="background: linear-gradient(135deg, #059669 0%, #10B981 100%); color: #fff;">
                <div class="d-flex justify-content-between align-items-center">
                    <h2 class="h3 mb-0 d-flex align-items-center gap-2" style="color: #fff;">
                        <i class="fas fa-user"></i>
                        Detalhes do Cliente
                    </h2>
                    <a href="{{ route('clientes.index') }}" class="btn btn-outline-light btn-sm">
                        <i class="fas fa-arrow-left"></i> Voltar
                    </a>
                </div>
            </div>

            <div class="p-4 p-md-5">
                <div class="row g-4">
                    <div class="col-12">
                        <small class="text-muted d-block mb-1">Nome</small>
                        <div class="fw-semibold">{{ $cliente->nome }}</div>
                    </div>
                    <div class="col-md-6">
                        <small class="text-muted d-block mb-1">Telefone</small>
                        <div>{{ $cliente->telefone }}</div>
                    </div>
                    <div class="col-md-6">
                        <small class="text-muted d-block mb-1">CPF</small>
                        <div>{{ $cliente->cpf }}</div>
                    </div>
                    <div class="col-md-6">
                        <small class="text-muted d-block mb-1">E-mail</small>
                        <div>{{ $cliente->email }}</div>
                    </div>
                    <div class="col-md-6">
                        <small class="text-muted d-block mb-1">Endereço</small>
                        <div>{{ $cliente->endereco }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
