<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PaymentAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {   
        if(!$request->session()->has('qr_code')) {
            return redirect()->route('main.index')->with('error', 'anda belum booking');
        }
        return $next($request);
    }
}
