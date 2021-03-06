<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class TienePerfil
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // return $next($request);
        $user_id = auth()->user()->id;
        if ( Profile::where(["user_id"=> $user_id])->exists() ) { //solo si el rol es de evaluador o de administrador            
            return $next($request);
        }
        abort(403, "se requiere tener un perfil para hacer esta acción");
    }
}
