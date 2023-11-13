<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Empresa;

class EmpresaSubdomain
{
    public function handle($request, Closure $next)
    {
        return $next($request);
        // $subdomain = $request->route('subdomain');

        // if ($subdomain) {
        //     // Buscar la empresa por el subdominio
        //     $empresa = Empresa::where('dominio', $subdomain)->first();

        //     if ($empresa) {
        //         // Puedes almacenar la información de la empresa en la sesión, por ejemplo
        //         session(['empresa' => $empresa]);
        //         return $next($request);
        //     }
        // }

        // // Redireccionar o manejar el caso en el que la empresa no existe
        // return redirect()->route('empresa.no_encontrada');
        }
}

