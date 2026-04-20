<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsBarbeiro
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check() || !auth()->user()->isBarbeiro()) {
            abort(403, 'Acesso negado. Apenas barbeiros podem acessar essa área.');
        }

        return $next($request);
    }
}
