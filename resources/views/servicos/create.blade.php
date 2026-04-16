@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="d-flex flex-column flex-md-row align-items-start align-items-md-center justify-content-between mb-4 gap-3">
                    <div>
                        <h1 class="h3">Novo Serviço</h1>
                        <p class="text-muted mb-0">Cadastre um novo serviço para venda na barbearia.</p>
                    </div>
                    <a href="{{ route('servicos.index') }}" class="btn btn-outline-secondary">Voltar</a>
                </div>

                <form method="POST" action="{{ route('servicos.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Nome</label>
                        <input type="text" name="nome" value="{{ old('nome') }}" required class="form-control form-control-lg rounded-4" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Descrição</label>
                        <textarea name="descricao" rows="3" class="form-control rounded-4">{{ old('descricao') }}</textarea>
                    </div>
                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <label class="form-label">Preço</label>
                            <input type="number" step="0.01" name="preco" value="{{ old('preco') }}" required class="form-control rounded-4" />
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Duração (minutos)</label>
                            <input type="number" name="duracao_minutos" value="{{ old('duracao_minutos') }}" required class="form-control rounded-4" />
                        </div>
                    </div>
                    <button type="submit" class="btn btn-dark btn-lg rounded-4">Salvar serviço</button>
                </form>
            </div>
        </div>
    </div>
@endsection
