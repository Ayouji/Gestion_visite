<?php

namespace App\Http\Middleware;

use App\Models\Visitte;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Result
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {   
        $visite = Visitte::find($request->id);
        
        //dd($request->id);
        return $next($request);
    }
}
