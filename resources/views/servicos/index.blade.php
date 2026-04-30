@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="{{ asset('css/index.css') }}">

<div class="container-fluid py-4">

    <!-- HEADER -->
    <div class="page-header d-flex flex-column flex-md-row align-items-start align-items-md-center justify-content-between gap-3">
        <div class="slide-in-left">
            <h2 class="page-title d-flex align-items-center gap-2">
                <span class="icon-box">
                    <i class="fas fa-scissors"></i>
                </span>
                Serviços
            </h2>
            <p class="page-description">
                Gerencie os serviços oferecidos pela barbearia
            </p>
        </div>

        <a href="{{ route('servicos.create') }}" class="btn btn-gold">
            <i class="fas fa-plus"></i> Novo Serviço
        </a>
    </div>

    <!-- BUSCA -->
    <form method="GET" class="mb-4 fade-in delay-200">
        <div class="input-group custom-search">
            <span class="input-group-text">
                <i class="fas fa-search"></i>
            </span>

            <input type="search" name="search"
                value="{{ request('search') }}"
                placeholder="Buscar por nome ou descrição"
                class="form-control"
            >

            <button class="btn btn-gold px-4" type="submit">
                Buscar
            </button>
        </div>
    </form>

    <!-- TABELA -->
    <div class="card custom-card">

        <div class="card-header-custom d-flex justify-content-between align-items-center">
            <span><i class="fas fa-list"></i> Lista de Serviços</span>
            <span class="badge badge-gold">
                {{ $servicos->count() }}
            </span>
        </div>

        <div class="table-responsive">
            <table class="table custom-table align-middle">
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
                                <a href="{{ route('servicos.edit', $servico) }}"
                                   class="btn btn-sm btn-outline-gold">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <form action="{{ route('servicos.destroy', $servico) }}"
                                      method="POST"
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
                            <td colspan="4" class="empty-state">
                                Nenhum serviço encontrado.
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>
        </div>
    </div>

</div>
@endsection