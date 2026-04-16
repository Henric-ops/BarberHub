@extends('layouts.app')

@section('content')
    <div class="container-fluid py-4">
        <div class="panel p-4 shadow-sm">
            <div class="d-flex flex-column flex-md-row align-items-start align-items-md-center justify-content-between gap-3 mb-4">
                <div>
                    <h1 class="h3 mb-1">Editar Serviço</h1>
                    <p class="text-muted mb-0">Atualize as informações do serviço.</p>
                </div>
                <a href="{{ route('servicos.index') }}" class="btn btn-outline-secondary">Voltar</a>
            </div>

            <form method="POST" action="{{ route('servicos.update', $servico) }}">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Nome</label>
                    <input type="text" name="nome" value="{{ old('nome', $servico->nome) }}" required class="form-control form-control-lg rounded-4" />
                </div>
                <div class="mb-3">
                    <label class="form-label">Descrição</label>
                    <textarea name="descricao" rows="3" class="form-control rounded-4">{{ old('descricao', $servico->descricao) }}</textarea>
                </div>
                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <label class="form-label">Preço</label>
                        <input type="number" step="0.01" name="preco" value="{{ old('preco', $servico->preco) }}" required class="form-control rounded-4" />
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Duração (minutos)</label>
                        <input type="number" name="duracao_minutos" value="{{ old('duracao_minutos', $servico->duracao_minutos) }}" required class="form-control rounded-4" />
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-lg rounded-4">Salvar alterações</button>
            </form>
        </div>
    </div>
@endsection
