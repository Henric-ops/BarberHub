@extends('layouts.app')

@section('content')
    <div class="container-fluid py-4">
        <div class="card rounded-lg shadow-md">
            <div class="p-4 border-bottom" style="background: linear-gradient(135deg, #F97316 0%, #FB923C 100%); color: #fff;">
                <div class="d-flex flex-column flex-md-row align-items-start align-items-md-center justify-content-between gap-3">
                    <div class="slide-in-left">
                        <h2 class="h3 mb-1 d-flex align-items-center gap-2" style="color: #fff;">
                            <i class="fas fa-scissors"></i>
                            Novo Serviço
                        </h2>
                        <p class="mb-0" style="color: rgba(255, 255, 255, 0.9);">Cadastre um novo serviço para venda na barbearia.</p>
                    </div>
                    <a href="{{ route('servicos.index') }}" class="btn btn-outline-light">
                        <i class="fas fa-arrow-left"></i> Voltar
                    </a>
                </div>
            </div>

            <div class="p-4 p-md-5">
                <form method="POST" action="{{ route('servicos.store') }}">
                    @csrf
                    <div class="form-group mb-4 fade-in delay-100">
                        <label class="form-label">Nome</label>
                        <input type="text" name="nome" value="{{ old('nome') }}" required class="form-control form-control-lg rounded-lg" placeholder="Nome do serviço" />
                        @error('nome')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-4 fade-in delay-200">
                        <label class="form-label">Descrição</label>
                        <textarea name="descricao" rows="3" class="form-control rounded-lg" placeholder="Descrição do serviço">{{ old('descricao') }}</textarea>
                        @error('descricao')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="row g-3 mb-5 fade-in delay-300">
                        <div class="col-md-6">
                            <label class="form-label">Preço</label>
                            <input type="number" step="0.01" name="preco" value="{{ old('preco') }}" required class="form-control rounded-lg" placeholder="0.00" />
                            @error('preco')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Duração (minutos)</label>
                            <input type="number" name="duracao_minutos" value="{{ old('duracao_minutos') }}" required class="form-control rounded-lg" placeholder="30" />
                            @error('duracao_minutos')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="d-flex gap-2 fade-in delay-400">
                        <button type="submit" class="btn btn-primary btn-lg">
                            <i class="fas fa-save"></i> Salvar serviço
                        </button>
                        <a href="{{ route('servicos.index') }}" class="btn btn-outline-secondary btn-lg">
                            <i class="fas fa-times"></i> Cancelar
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
