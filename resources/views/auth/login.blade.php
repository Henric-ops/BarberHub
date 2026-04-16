@extends('layouts.app')

@section('content')
    <div class="max-w-lg mx-auto bg-white rounded-lg shadow p-8">
        <h1 class="text-2xl font-semibold mb-4">Login</h1>
        <form method="POST" action="{{ route('login') }}" class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-medium text-slate-700">E-mail</label>
                <input type="email" name="email" value="{{ old('email') }}" required autofocus
                    class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:border-slate-500 focus:ring-slate-500">
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700">Senha</label>
                <input type="password" name="password" required
                    class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:border-slate-500 focus:ring-slate-500">
            </div>

            <div class="flex items-center justify-between">
                <label class="inline-flex items-center gap-2 text-sm text-slate-700">
                    <input type="checkbox" name="remember" class="rounded border-gray-300 text-slate-600 focus:ring-slate-500">
                    Lembrar-me
                </label>
            </div>

            <button type="submit" class="w-full rounded bg-[#1b1b18] px-4 py-2 text-white hover:bg-slate-900">Entrar</button>
        </form>
    </div>
@endsection
