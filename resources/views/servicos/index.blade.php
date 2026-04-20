@extends('layouts.app')

@section('content')
    <div class="container-fluid py-4">
        <div class="page-header d-flex flex-column flex-md-row align-items-start align-items-md-center justify-content-between gap-3">
            <div class="slide-in-left">
                <h2 class="page-title d-flex align-items-center gap-2">
                    <span class="d-inline-flex align-items-center justify-content-center" style="width: 40px; height: 40px; background: rgba(249, 115, 22, 0.15); border-radius: 10px;">
                        <i class="fas fa-scissors" style="color: #F97316;"></i>
                    </span>
                    Serviços
                </h2>
                <p class="page-description">Cadastre, edite e remova os serviços oferecidos pela barbearia.</p>
            </div>
            <a href="{{ route('servicos.create') }}" class="btn btn-secondary btn-lg">
                <i class="fas fa-plus"></i> Novo Serviço
            </a>
        </div>

        <form method="GET" class="mb-4 fade-in delay-200">
            <div class="input-group shadow-sm rounded-lg overflow-hidden border" style="border-color: var(--color-border);">
                <span class="input-group-text bg-white border-0" style="color: var(--color-text-muted);">
                    <i class="fas fa-search"></i>
                </span>
                <input type="search" name="search" value="{{ request('search') }}" placeholder="Buscar por nome ou descrição" class="form-control border-0" aria-label="Buscar">
                <button class="btn btn-primary px-4" type="submit">
                    <i class="fas fa-search"></i> Buscar
                </button>
            </div>
        </form>

        <div class="custom-table-card overflow-hidden">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Preço</th>
                            <th>Duração</th>
                            <th class="text-end">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($servicos as $servico)
                            <tr>
                                <td>{{ $servico->nome }}</td>
                                <td>R$ {{ number_format($servico->preco, 2, ',', '.') }}</td>
                                <td>{{ $servico->duracao_minutos }} min</td>
                                <td class="text-end d-flex gap-2 justify-content-end">
                                    <a href="{{ route('servicos.edit', $servico) }}" class="btn btn-sm btn-outline-primary" title="Editar serviço">
                                        <i class="fas fa-edit"></i> Editar
                                    </a>
                                    <form action="{{ route('servicos.destroy', $servico) }}" method="POST" class="d-inline" onsubmit="return confirm('Tem certeza que deseja excluir este serviço?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" title="Excluir serviço">
                                            <i class="fas fa-trash"></i> Excluir
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted py-4">Nenhum serviço encontrado.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
