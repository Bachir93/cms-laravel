<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Roles
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  $role
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $role)
    {
        //Compruebo si el campo correspondiente (usuarios o noticias) es igual a 1
        // Si el usuario esta autenticado y no tiene permisos sobre los usuarios le dirijo a la página de inicio
        if (Auth::user()->$role != 1) {
            return redirect('admin')->with('warning', 'Operación no autorizada');
        }

        return $next($request);
    }
}
