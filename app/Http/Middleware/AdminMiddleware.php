<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Verifica si el usuario autenticado tiene el rol de administrador
        if (auth()->check() && auth()->user()->rol->nombre==='Administrador') {
            return $next($request);
        }
        // Si el usuario no tiene el rol de administrador, redirige o toma otra acción
        return redirect('/login');   
    }
}
