<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {   
        // ini adalah untuk middleware akses admin di dashboard
        if ($request->user() && $request->user()->role === 'admin') {
            return $next($request);
        }

        abort(403, "anda tidak diizinkan masuk");
    }
}
