@extends('layouts.app')

@section('content')
    <div class="max-w-3xl mx-auto rounded-lg border border-slate-200 bg-white p-6 shadow-sm">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h1 class="text-2xl font-semibold">Editar Agendamento</h1>
                <p class="text-sm text-slate-600">Atualize o agendamento ou apenas o status.</p>
            </div>
            <a href="{{ route('agendamentos.index') }}" class="rounded bg-slate-800 px-4 py-2 text-white">Voltar</a>
        </div>

        <form method="POST" action="{{ route('agendamentos.update', $agendamento) }}" class="space-y-4">
            @csrf
            @method('PUT')

            @if(auth()->user()->isAdministrador())
                <div class="grid gap-4 sm:grid-cols-2">
                    <div>
                        <label class="block text-sm font-medium text-slate-700">Cliente</label>
                        <select name="cliente_id" required class="mt-1 block w-full rounded border border-slate-300 px-3 py-2 focus:border-slate-500 focus:ring-slate-500">
                            @foreach($clientes as $cliente)
                                <option value="{{ $cliente->id }}" {{ old('cliente_id', $agendamento->cliente_id) == $cliente->id ? 'selected' : '' }}>{{ $cliente->nome }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700">Barbeiro</label>
                        <select name="barbeiro_id" required class="mt-1 block w-full rounded border border-slate-300 px-3 py-2 focus:border-slate-500 focus:ring-slate-500">
                            @foreach($barbeiros as $barbeiro)
                                <option value="{{ $barbeiro->id }}" {{ old('barbeiro_id', $agendamento->barbeiro_id) == $barbeiro->id ? 'selected' : '' }}>{{ $barbeiro->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700">Serviço</label>
                    <select name="servico_id" required class="mt-1 block w-full rounded border border-slate-300 px-3 py-2 focus:border-slate-500 focus:ring-slate-500">
                        @foreach($servicos as $servico)
                            <option value="{{ $servico->id }}" {{ old('servico_id', $agendamento->servico_id) == $servico->id ? 'selected' : '' }}>{{ $servico->nome }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="grid gap-4 sm:grid-cols-2">
                    <div>
                        <label class="block text-sm font-medium text-slate-700">Início</label>
                        <input type="datetime-local" name="data_hora_inicio" value="{{ old('data_hora_inicio', $agendamento->data_hora_inicio?->format('Y-m-d\TH:i')) }}" required
                            class="mt-1 block w-full rounded border border-slate-300 px-4 py-2 focus:border-slate-500 focus:ring-slate-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700">Fim</label>
                        <input type="datetime-local" name="data_hora_fim" value="{{ old('data_hora_fim', $agendamento->data_hora_fim?->format('Y-m-d\TH:i')) }}" required
                            class="mt-1 block w-full rounded border border-slate-300 px-4 py-2 focus:border-slate-500 focus:ring-slate-500">
                    </div>
                </div>
            @else
                <div class="grid gap-4 sm:grid-cols-2">
                    <div>
                        <label class="block text-sm font-medium text-slate-700">Cliente</label>
                        <input type="text" value="{{ $agendamento->cliente->nome }}" disabled class="mt-1 block w-full rounded border border-slate-300 bg-slate-100 px-4 py-2">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700">Barbeiro</label>
                        <input type="text" value="{{ $agendamento->barbeiro->name }}" disabled class="mt-1 block w-full rounded border border-slate-300 bg-slate-100 px-4 py-2">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700">Serviço</label>
                    <input type="text" value="{{ $agendamento->servico->nome }}" disabled class="mt-1 block w-full rounded border border-slate-300 bg-slate-100 px-4 py-2">
                </div>

                <div class="grid gap-4 sm:grid-cols-2">
                    <div>
                        <label class="block text-sm font-medium text-slate-700">Início</label>
                        <input type="text" value="{{ $agendamento->data_hora_inicio->format('d/m/Y H:i') }}" disabled class="mt-1 block w-full rounded border border-slate-300 bg-slate-100 px-4 py-2">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700">Fim</label>
                        <input type="text" value="{{ $agendamento->data_hora_fim->format('d/m/Y H:i') }}" disabled class="mt-1 block w-full rounded border border-slate-300 bg-slate-100 px-4 py-2">
                    </div>
                </div>
            @endif

            <div>
                <label class="block text-sm font-medium text-slate-700">Status</label>
                <select name="status" required class="mt-1 block w-full rounded border border-slate-300 px-3 py-2 focus:border-slate-500 focus:ring-slate-500">
                    <option value="agendado" {{ old('status', $agendamento->status) == 'agendado' ? 'selected' : '' }}>Agendado</option>
                    <option value="concluido" {{ old('status', $agendamento->status) == 'concluido' ? 'selected' : '' }}>Concluído</option>
                    <option value="cancelado" {{ old('status', $agendamento->status) == 'cancelado' ? 'selected' : '' }}>Cancelado</option>
                </select>
            </div>

            <button type="submit" class="rounded bg-[#1b1b18] px-4 py-2 text-white">Salvar alterações</button>
        </form>
    </div>
@endsection
