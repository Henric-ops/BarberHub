@extends('layouts.app')

@section('content')
    <div class="container-fluid py-4">
        <div class="d-flex flex-column flex-md-row align-items-start align-items-md-center justify-content-between gap-3 mb-4">
            <div>
                <h1 class="h2 mb-1">Clientes</h1>
                <p class="text-muted mb-0">Gerencie os cadastros de clientes e encontre informações rapidamente.</p>
            </div>
            <a href="{{ route('clientes.create') }}" class="btn btn-secondary btn-lg rounded-pill">Novo Cliente</a>
        </div>

        <form method="GET" class="mb-4">
            <div class="input-group shadow-sm rounded-pill overflow-hidden border" style="border-color: var(--color-border);">
                <input type="search" name="search" value="{{ request('search') }}" placeholder="Buscar por nome ou telefone" class="form-control" aria-label="Buscar">
                <button class="btn btn-primary px-4" type="submit">Buscar</button>
            </div>
        </form>

        <div class="custom-table-card overflow-hidden">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
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
                                <td class="text-end">
                                    <a href="{{ route('clientes.edit', $cliente) }}" class="btn btn-sm btn-outline-secondary me-2">Editar</a>
                                    <form action="{{ route('clientes.destroy', $cliente) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-dark">Excluir</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted py-4">Nenhum cliente encontrado.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
