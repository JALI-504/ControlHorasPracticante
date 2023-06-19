<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EstadoUsuario
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->estado == false) {
            // Usuario desactivado, redirige o muestra un mensaje de error según tu lógica
            abort(403, 'Usuario desactivado');
        }

        return $next($request);
    }
}
