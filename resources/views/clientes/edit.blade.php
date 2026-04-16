@extends('layouts.app')

@section('content')
    <div class="container-fluid py-4">
        <div class="panel p-4 shadow-sm">
            <div class="d-flex flex-column flex-md-row align-items-start align-items-md-center justify-content-between gap-3 mb-4">
                <div>
                    <h1 class="h3 mb-1">Editar Cliente</h1>
                    <p class="text-muted mb-0">Atualize os dados do cliente.</p>
                </div>
                <a href="{{ route('clientes.index') }}" class="btn btn-outline-secondary">Voltar</a>
            </div>

            <form method="POST" action="{{ route('clientes.update', $cliente) }}">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Nome</label>
                    <input type="text" name="nome" value="{{ old('nome', $cliente->nome) }}" required class="form-control form-control-lg rounded-4" />
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Telefone</label>
                        <input type="text" name="telefone" value="{{ old('telefone', $cliente->telefone) }}" required class="form-control rounded-4" />
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">CPF</label>
                        <input type="text" name="cpf" value="{{ old('cpf', $cliente->cpf) }}" required class="form-control rounded-4" />
                    </div>
                </div>

                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <label class="form-label">E-mail</label>
                        <input type="email" name="email" value="{{ old('email', $cliente->email) }}" class="form-control rounded-4" />
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Endereço</label>
                        <input type="text" name="endereco" value="{{ old('endereco', $cliente->endereco) }}" class="form-control rounded-4" />
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-lg rounded-4">Salvar cliente</button>
            </form>
        </div>
    </div>
@endsection
