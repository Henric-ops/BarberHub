@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <div class="d-flex flex-column flex-md-row align-items-start align-items-md-center justify-content-between gap-3 mb-4">
            <div>
                <h1 class="h2">Serviços</h1>
                <p class="text-muted">Cadastre, edite e remova serviços oferecidos pela barbearia.</p>
            </div>
            <a href="{{ route('servicos.create') }}" class="btn btn-warning btn-lg">Novo Serviço</a>
        </div>

        <form method="GET" class="mb-4">
            <div class="input-group">
                <input type="search" name="search" value="{{ request('search') }}" placeholder="Buscar por nome ou descrição" class="form-control rounded-start rounded-pill" aria-label="Buscar" />
                <button class="btn btn-outline-secondary rounded-end rounded-pill" type="submit">Buscar</button>
            </div>
        </form>

        <div class="card shadow-sm">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light text-uppercase text-secondary small">
                        <tr>
                            <th>Nome</th>
                            <th>Preço</th>
                            <th>Duração (min)</th>
                            <th class="text-end">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($servicos as $servico)
                            <tr>
                                <td>{{ $servico->nome }}</td>
                                <td>R$ {{ number_format($servico->preco, 2, ',', '.') }}</td>
                                <td>{{ $servico->duracao_minutos }}</td>
                                <td class="text-end">
                                    <a href="{{ route('servicos.edit', $servico) }}" class="btn btn-sm btn-outline-dark me-2">Editar</a>
                                    <form action="{{ route('servicos.destroy', $servico) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
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
