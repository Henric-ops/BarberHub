@extends('layouts.app')

@section('content')

    <link rel="stylesheet" href="{{ asset('css/index.css') }}">

    <div class="container-fluid py-4">

        <!-- HEADER -->
        <div
            class="page-header d-flex flex-column flex-md-row align-items-start align-items-md-center justify-content-between gap-3">
            <div class="slide-in-left">
                <h2 class="page-title d-flex align-items-center gap-2">
                    <span class="icon-box">
                        <i class="fas fa-users"></i>
                    </span>
                    Clientes
                </h2>
                <p class="page-description">
                    Gerencie os cadastros de clientes
                </p>
            </div>

            <a href="{{ route('clientes.create') }}" class="btn btn-gold"> <i class="fas fa-plus"></i> Novo Cliente
            </a>
        </div>

        <!-- BUSCA -->
        <form method="GET" class="mb-4 fade-in delay-200">
            <div class="input-group custom-search">
                <span class="input-group-text">
                    <i class="fas fa-search"></i>
                </span>

                <input type="search" name="search" value="{{ request('search') }}" placeholder="Buscar por nome ou telefone"
                    class="form-control">

                <button class="btn btn-gold px-4" type="submit">
                    Buscar
                </button>
            </div>
        </form>

        <!-- TABELA -->
        <div class="card custom-card">

            <div class="card-header-custom d-flex justify-content-between align-items-center">
                <span><i class="fas fa-list"></i> Lista de Clientes</span>
                <span class="badge badge-gold">
                    {{ $clientes->count() }}
                </span>
            </div>

            <div class="table-responsive">
                <table class="table align-middle custom-table">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Telefone</th>
                            <th>CPF</th>
                            <th>E-mail</th>
                            <th class="text-end">Ações</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($clientes as $cliente)
                            <tr>
                                <td>{{ $cliente->nome }}</td>
                                <td>{{ $cliente->telefone }}</td>
                                <td>{{ $cliente->cpf }}</td>
                                <td>{{ $cliente->email }}</td>

                                <td class="text-end d-flex gap-2 justify-content-end">
                                    <a href="{{ route('clientes.edit', $cliente) }}" class="btn btn-sm btn-outline-gold">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <form action="{{ route('clientes.destroy', $cliente) }}" method="POST"
                                        onsubmit="return confirm('Tem certeza?');">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-sm btn-danger-soft">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="empty-state">
                                    Nenhum cliente encontrado.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>
        </div>

    </div>
@endsection