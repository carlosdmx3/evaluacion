<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdminUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && auth()->user()->rol_usr === "admin") {
            return $next($request);
            return redirect()->back()->with("mensaje", "Admin");
        } else {
            return redirect()->back()->with("mensaje", "No puedes acceder al módulo seleccionado");
        }
        
        //return $next($request);
    }
}
