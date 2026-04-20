@extends('layouts.app')

@section('content')
    <div class="container-fluid py-4">

        {{-- ALERTAS --}}
        @if(session('success'))
            <div class="alert alert-success d-flex align-items-center gap-2 shadow-sm">
                <i class="fas fa-check-circle"></i>
                {{ session('success') }}
            </div>
        @endif

        {{-- HEADER --}}
        <div class="page-header d-flex flex-column flex-md-row align-items-start align-items-md-center justify-content-between gap-3">
            <div class="slide-in-left">
                <h2 class="page-title d-flex align-items-center gap-2">
                    <span class="d-inline-flex align-items-center justify-content-center" style="width: 40px; height: 40px; background: rgba(37, 99, 235, 0.15); border-radius: 10px;">
                        <i class="fas fa-user-tie text-primary"></i>
                    </span>
                    Barbeiros
                </h2>
                <p class="page-description">Gerencie os barbeiros da barbearia.</p>
            </div>

            @if(auth()->user()->isAdministrador())
                <a href="{{ route('barbeiros.create') }}" class="btn btn-primary btn-lg">
                    <i class="fas fa-plus"></i> Novo Barbeiro
                </a>
            @endif
        </div>

        {{-- BUSCA --}}
        <form method="GET" class="mb-4 fade-in delay-200">
            <div class="input-group shadow-sm rounded-lg overflow-hidden border" style="border-color: var(--color-border);">
                <span class="input-group-text bg-white border-0" style="color: var(--color-text-muted);">
                    <i class="fas fa-search"></i>
                </span>
                <input type="search" name="search" value="{{ request('search') }}" placeholder="Buscar por nome ou e-mail" class="form-control border-0" aria-label="Buscar">
                <button class="btn btn-primary px-4" type="submit">
                    <i class="fas fa-search"></i> Buscar
                </button>
            </div>
        </form>

        <div class="custom-table-card overflow-hidden">
            <div class="p-4 border-bottom" style="background: var(--color-background-alt);">
                <strong class="d-flex align-items-center gap-2" style="color: var(--color-primary);">
                    <i class="fas fa-list"></i>
                    Lista de Barbeiros
                </strong>
                <span class="badge badge-primary ms-auto">{{ $barbeiros->total() }} registros</span>
            </div>

            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th>Telefone</th>
                            <th class="text-end">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($barbeiros as $barbeiro)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <span class="d-inline-flex align-items-center justify-content-center" style="width: 36px; height: 36px; background: linear-gradient(135deg, #2563EB 0%, #3B82F6 100%); border-radius: 50%; color: #fff; font-weight: 600; font-size: 0.9rem;">
                                            {{ substr($barbeiro->name, 0, 1) }}
                                        </span>
                                        <strong>{{ $barbeiro->name }}</strong>
                                    </div>
                                </td>
                                <td>{{ $barbeiro->email }}</td>
                                <td>{{ $barbeiro->telefone ?? '-' }}</td>
                                <td class="text-end d-flex gap-2 justify-content-end">
                                    <a href="{{ route('barbeiros.edit', $barbeiro) }}" class="btn btn-sm btn-outline-primary" title="Editar barbeiro">
                                        <i class="fas fa-edit"></i> Editar
                                    </a>
                                    <form action="{{ route('barbeiros.destroy', $barbeiro) }}" method="POST" class="d-inline" onsubmit="return confirm('Tem certeza que deseja excluir este barbeiro?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" title="Excluir barbeiro">
                                            <i class="fas fa-trash"></i> Excluir
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted py-4">
                                    <i class="fas fa-inbox" style="font-size: 2rem; opacity: 0.5;"></i>
                                    <p class="mt-2">Nenhum barbeiro encontrado.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($barbeiros->hasPages())
                <div class="p-3 border-top">
                    {{ $barbeiros->links() }}
                </div>
            @endif
        </div>

    </div>
@endsection
