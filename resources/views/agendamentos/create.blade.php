@extends('layouts.app')

@section('content')
    <div class="max-w-3xl mx-auto rounded-lg border border-slate-200 bg-white p-6 shadow-sm">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h1 class="text-2xl font-semibold">Novo Agendamento</h1>
                <p class="text-sm text-slate-600">Associe cliente, barbeiro e serviço a uma data e horário.</p>
            </div>
            <a href="{{ route('agendamentos.index') }}" class="rounded bg-slate-800 px-4 py-2 text-white">Voltar</a>
        </div>

        <form method="POST" action="{{ route('agendamentos.store') }}" class="space-y-4">
            @csrf

            <div class="grid gap-4 sm:grid-cols-2">
                <div>
                    <label class="block text-sm font-medium text-slate-700">Cliente</label>
                    <select name="cliente_id" required class="mt-1 block w-full rounded border border-slate-300 px-3 py-2 focus:border-slate-500 focus:ring-slate-500">
                        <option value="">Selecione</option>
                        @foreach($clientes as $cliente)
                            <option value="{{ $cliente->id }}" {{ old('cliente_id') == $cliente->id ? 'selected' : '' }}>{{ $cliente->nome }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700">Barbeiro</label>
                    <select name="barbeiro_id" required class="mt-1 block w-full rounded border border-slate-300 px-3 py-2 focus:border-slate-500 focus:ring-slate-500">
                        <option value="">Selecione</option>
                        @foreach($barbeiros as $barbeiro)
                            <option value="{{ $barbeiro->id }}" {{ old('barbeiro_id') == $barbeiro->id ? 'selected' : '' }}>{{ $barbeiro->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="grid gap-4 sm:grid-cols-2">
                <div>
                    <label class="block text-sm font-medium text-slate-700">Serviço</label>
                    <select name="servico_id" required class="mt-1 block w-full rounded border border-slate-300 px-3 py-2 focus:border-slate-500 focus:ring-slate-500">
                        <option value="">Selecione</option>
                        @foreach($servicos as $servico)
                            <option value="{{ $servico->id }}" {{ old('servico_id') == $servico->id ? 'selected' : '' }}>{{ $servico->nome }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700">Status</label>
                    <select name="status" class="mt-1 block w-full rounded border border-slate-300 px-3 py-2 focus:border-slate-500 focus:ring-slate-500">
                        <option value="agendado" {{ old('status') == 'agendado' ? 'selected' : '' }}>Agendado</option>
                        <option value="concluido" {{ old('status') == 'concluido' ? 'selected' : '' }}>Concluído</option>
                        <option value="cancelado" {{ old('status') == 'cancelado' ? 'selected' : '' }}>Cancelado</option>
                    </select>
                </div>
            </div>

            <div class="grid gap-4 sm:grid-cols-2">
                <div>
                    <label class="block text-sm font-medium text-slate-700">Início</label>
                    <input type="datetime-local" name="data_hora_inicio" value="{{ old('data_hora_inicio') }}" required
                        class="mt-1 block w-full rounded border border-slate-300 px-4 py-2 focus:border-slate-500 focus:ring-slate-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700">Fim</label>
                    <input type="datetime-local" name="data_hora_fim" value="{{ old('data_hora_fim') }}" required
                        class="mt-1 block w-full rounded border border-slate-300 px-4 py-2 focus:border-slate-500 focus:ring-slate-500">
                </div>
            </div>

            <button type="submit" class="rounded bg-[#1b1b18] px-4 py-2 text-white">Salvar agendamento</button>
        </form>
    </div>
@endsection
