@extends('layouts.app')

@section('content')
    <style>
        /* Estilos específicos para a tabela de barbeiros - BOTÕES PADRONIZADOS */
        .barbeiro-table {
            --table-bg: var(--bg-card);
            --table-border: var(--border);
            --table-hover: var(--bg-hover);
            --table-text: var(--text);
            --table-text-muted: var(--text-muted);
        }

        .barbeiro-table {
            background: transparent !important;
            border: 1px solid var(--table-border);
            border-radius: var(--radius);
            overflow: hidden;
            color: var(--table-text);
        }

        .barbeiro-table thead th {
            background: var(--bg-panel) !important;
            color: var(--text);
            font-weight: 600;
            font-size: 0.875rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border: none;
            padding: 1.25rem 1rem;
            border-bottom: 2px solid var(--border-light);
        }

        .barbeiro-table tbody tr {
            background: transparent !important;
            border-bottom: 1px solid var(--border);
            transition: all 0.2s ease;
        }

        .barbeiro-table tbody tr:hover {
            background: var(--table-hover) !important;
            transform: translateX(4px);
        }

        .barbeiro-table tbody td {
            background: transparent !important;
            padding: 1.25rem 1rem;
            vertical-align: middle;
            border: none;
            color: var(--table-text);
        }

        .barbeiro-avatar {
            width: 44px;
            height: 44px;
            background: linear-gradient(135deg, var(--gold) 0%, var(--gold-mid) 100%);
            border-radius: 50%;
            color: var(--bg-base) !important;
            font-weight: 700;
            font-size: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            box-shadow: 0 4px 12px var(--gold-dim);
        }

        .barbeiro-nome {
            color: var(--gold);
            font-weight: 600;
            margin: 0;
        }

        .barbeiro-email {
            color: var(--text);
            font-size: 0.9rem;
        }

        .barbeiro-telefone {
            color: var(--text-muted);
            font-size: 0.9rem;
        }

        .card-header-custom {
            background: linear-gradient(135deg, var(--bg-panel) 0%, var(--bg-card) 100%);
            border-bottom: 1px solid var(--border-light);
        }

        .page-title {
            color: var(--text);
            font-weight: 700;
            margin: 0;
        }

        .page-description {
            color: var(--text-muted);
            margin: 0;
            font-size: 0.95rem;
        }

        .alert {
            background: linear-gradient(135deg, var(--green-dim) 0%, var(--green-dim) 100%);
            border: 1px solid var(--green);
            color: var(--green);
            border-radius: var(--radius);
            padding: 1rem 1.25rem;
            box-shadow: 0 4px 15px var(--green-dim);
        }

        .input-group {
            border-radius: var(--radius);
            overflow: hidden;
            border: 1px solid var(--border-light);
            background: var(--bg-card);
        }

        .input-group .input-group-text {
            background: var(--bg-panel);
            border: none;
            color: var(--text-muted);
        }

        .form-control {
            background: var(--bg-panel);
            border: none;
            color: var(--text);
        }

        .form-control::placeholder {
            color: var(--text-dim);
        }

        .btn-gold {
            background: linear-gradient(135deg, var(--gold) 0%, #b89442 100%) !important;
            border: none !important;
            color: #1a1e28 !important;
            border-radius: var(--radius-sm);
            font-weight: 600;
            padding: 0.75rem 1.5rem;
            /* MESMO TAMANHO */
            transition: all 0.2s ease;
            box-shadow: 0 4px 15px var(--gold-dim);
            font-size: 0.9rem;
            /* Padronizado */
        }

        .btn-gold:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px var(--gold-mid);
            color: #1a1e28 !important;
        }

        /* Botões de ação da tabela - MESMO EXATO DA AGENDAMENTOS */
        .btn-table-action {
            width: 40px;
            height: 40px;
            border-radius: var(--radius-sm);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s ease;
            border: 1px solid transparent;
            font-size: 0.875rem;
          
        }

        .btn-table-action:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
        }

        .btn-table-action.btn-outline-primary {
            color: var(--blue);
            border-color: var(--blue-dim);
            background: rgba(77, 142, 240, 0.1);
        }

        .btn-table-action.btn-outline-primary:hover {
            background: var(--blue);
            color: white;
            border-color: var(--blue);
        }

        .btn-table-action.btn-danger {
            color: var(--red);
            border-color: var(--red-dim);
            background: rgba(224, 88, 88, 0.1);
        }

        .btn-table-action.btn-danger:hover {
            background: var(--red);
            color: white;
            border-color: var(--red);
        }

        .badge-primary {
            background: var(--gold-dim);
            color: var(--gold);
            font-weight: 600;
        }

        .barbeiro-empty {
            color: var(--text-muted);
        }

        .barbeiro-empty i {
            opacity: 0.3;
        }
    </style>

    <div class="container-fluid py-4">

        @if(session('success'))
            <div class="alert d-flex align-items-center gap-2">
                <i class="fas fa-check-circle"></i>
                {{ session('success') }}
            </div>
        @endif

        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4">
            <div>
                <h2 class="page-title d-flex align-items-center gap-2">
                    <span class="d-inline-flex align-items-center justify-content-center barbeiro-avatar">
                        {{ substr('Barbeiros', 0, 1) }}
                    </span>
                    Barbeiros
                </h2>
                <p class="page-description">Gerencie os barbeiros da barbearia.</p>
            </div>

            @if(auth()->user()->isAdministrador())
                <a href="{{ route('barbeiros.create') }}" class="btn btn-gold btn-lg">
                    <i class="fas fa-plus"></i> Novo Barbeiro
                </a>
            @endif
        </div>

        <form method="GET" class="mb-4">
            <div class="input-group">
                <span class="input-group-text">
                    <i class="fas fa-search"></i>
                </span>
                <input type="search" name="search" value="{{ request('search') }}" placeholder="Buscar por nome ou e-mail"
                    class="form-control">
                <button class="btn btn-gold px-4" type="submit">
                    <i class="fas fa-search"></i> Buscar
                </button>
            </div>
        </form>

        <div class="card barbeiro-table">

            <div class="card-header-custom d-flex justify-content-between align-items-center p-4">
                <span class="d-flex align-items-center gap-2">
                    <i class="fas fa-list"></i>
                    Lista de Barbeiros
                </span>
                <span class="badge badge-primary">
                    {{ $barbeiros->total() }} registros
                </span>
            </div>

            <div class="table-responsive">
                <table class="table barbeiro-table align-middle">
                    <thead>
                        <tr>
                            <th>Barbeiro</th>
                            <th>E-mail</th>
                            <th>Telefone</th>
                            <th class="text-end">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($barbeiros as $barbeiro)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center gap-3">
                                        <span class="barbeiro-avatar">
                                            {{ substr($barbeiro->name, 0, 1) }}
                                        </span>
                                        <div>
                                            <div class="barbeiro-nome">{{ $barbeiro->name }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="barbeiro-email">{{ $barbeiro->email }}</td>
                                <td class="barbeiro-telefone">{{ $barbeiro->telefone ?? '-' }}</td>
                                <td class="text-end">
                                    <div class="d-flex gap-2 justify-content-end">
                                        <a href="{{ route('barbeiros.edit', $barbeiro) }}"
                                            class="btn btn-sm btn-table-action btn-outline-primary" title="Editar barbeiro">
                                            <i class="fas fa-edit"></i> 
                                        </a>
                                        @if(auth()->user()->isAdministrador())
                                            <form action="{{ route('barbeiros.destroy', $barbeiro) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-table-action btn-danger"
                                                    title="Excluir barbeiro"
                                                    onclick="return confirm('Tem certeza que deseja excluir este barbeiro?')">
                                                    <i class="fas fa-trash"></i> 
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-5 barbeiro-empty">
                                    <i class="fas fa-user-tie fa-3x mb-3 d-block"></i>
                                    <p class="mb-0">Nenhum barbeiro encontrado</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($barbeiros->hasPages())
                <div class="p-4 border-top" style="background: var(--bg-panel); border-color: var(--border-light);">
                    <div class="d-flex justify-content-center">
                        {{ $barbeiros->links() }}
                    </div>
                </div>
            @endif

        </div>

    </div>
@endsection