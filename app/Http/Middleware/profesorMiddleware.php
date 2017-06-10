<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class profesorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::user()->tipo != 'Profesor') {
            abort(403, "¡No tienes permisos para acceder a esta seccion.");
        }
        return $next($request);
    }
}
