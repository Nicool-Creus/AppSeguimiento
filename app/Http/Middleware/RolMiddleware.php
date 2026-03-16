<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RolMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, $rolPermitido)
    {
        if (!session()->has('usuario')) {
            return redirect('/login');
        }

        $usuario = session('usuario');

        if ($usuario->tblrolesadministrativos_NIS != $rolPermitido) {
            abort(403, 'No autorizado');
        }

        return $next($request);
    }
}
