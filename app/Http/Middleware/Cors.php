<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Cors
{
    /**
     * Middleware especializado en dar control de acceso al protocolo CORS de todas las url´s 
     * de la aplicacion.
     * 
     * Se configura para que solo acepte peticiones desde el dominio de http://localhost:3000
     * 
     * La aplicación es consumida desde una aplicacion que no vive en el mismo dominio
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        return $next($request)
      ->header("Access-Control-Allow-Origin", "http://localhost:3000")
      ->header("Access-Control-Allow-Methods", "GET, POST, PUT, DELETE")
      ->header("Access-Control-Allow-Headers", "X-Requested-With, Content-Type, X-Token-Auth, Authorization"); 
    }
}

