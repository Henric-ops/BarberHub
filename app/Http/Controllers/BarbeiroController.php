<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class BarbeiroController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            abort_unless(auth()->user()->isAdministrador(), 403);
            return $next($request);
        });
    }

    /**
     * Display a listing of barbeiros.
     */
    public function index(Request $request)
    {
        $query = User::where('cargo', 'barbeiro');

        if ($request->search) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%$search%")
                    ->orWhere('email', 'like', "%$search%");
            });
        }

        $barbeiros = $query->paginate(10);

        return view('barbeiros.index', compact('barbeiros'));
    }

    /**
     * Show the form for creating a new barbeiro.
     */
    public function create()
    {
        return view('barbeiros.create');
    }

    /**
     * Store a newly created barbeiro in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'telefone' => 'nullable|string|max:20',
        ]);

        $validated['password'] = Hash::make($validated['password']);
        $validated['cargo'] = 'barbeiro';

        User::create($validated);

        return redirect()->route('barbeiros.index')
            ->with('success', 'Barbeiro cadastrado com sucesso!');
    }

    /**
     * Display the specified barbeiro.
     */
    public function show(User $barbeiro)
    {
        if ($barbeiro->cargo !== 'barbeiro') {
            abort(404);
        }

        return view('barbeiros.show', compact('barbeiro'));
    }

    /**
     * Show the form for editing the specified barbeiro.
     */
    public function edit(User $barbeiro)
    {
        if ($barbeiro->cargo !== 'barbeiro') {
            abort(404);
        }

        return view('barbeiros.edit', compact('barbeiro'));
    }

    /**
     * Update the specified barbeiro in storage.
     */
    public function update(Request $request, User $barbeiro)
    {
        if ($barbeiro->cargo !== 'barbeiro') {
            abort(404);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $barbeiro->id,
            'telefone' => 'nullable|string|max:20',
        ]);

        $barbeiro->update($validated);

        return redirect()->route('barbeiros.index')
            ->with('success', 'Barbeiro atualizado com sucesso!');
    }

    /**
     * Remove the specified barbeiro from storage.
     */
    public function destroy(User $barbeiro)
    {
        if ($barbeiro->cargo !== 'barbeiro') {
            abort(404);
        }

        $barbeiro->delete();

        return redirect()->route('barbeiros.index')
            ->with('success', 'Barbeiro excluído com sucesso!');
    }
}
