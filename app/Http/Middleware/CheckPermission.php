<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckPermission
{
    public function handle(Request $request, Closure $next)
    {
        //Verifique se o usuário está autenticado e possui permissão igual a 1
        if (auth()->check() && auth()->user()->permission == 1) {
            return $next($request);
        }

        return redirect('/home');
    }
}
