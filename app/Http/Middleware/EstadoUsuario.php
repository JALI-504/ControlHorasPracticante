<?php

// namespace App\Http\Middleware;

// use Closure;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;

// class EstadoUsuario
// {
//     public function handle(Request $request, Closure $next)
//     {
//         if (Auth::check() && Auth::user()->estado == false) {
            
//             // Usuario desactivado, muestra el mensaje de error y cierra la sesión
//             Auth::logout();
//             return back();
//         }

//         return $next($request);
//     }
// }


namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EstadoUsuario
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->estado == false) {
            // Usuario desactivado, cierra la sesión y muestra el mensaje
            Auth::logout();
            return redirect()->route('login')->with('error', 'Usuario desactivado');
        }

        return $next($request);
    }
}
