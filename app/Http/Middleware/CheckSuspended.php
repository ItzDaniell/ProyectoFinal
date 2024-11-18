<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckSuspended
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {   
        if (auth()->user()->Esta_Suspendido()) {
            return response()->json([
                'message' => 'Tu cuenta está suspendida hasta ' . auth()->user()->suspendido_hasta->format('d-m-Y H:i:s'),
            ], 403);
        }
    
        return $next($request);
    }
}
