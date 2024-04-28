<?php

namespace App\Http\Middleware;

use App\Models\Admin;
use Closure;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Isadmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->session()->has('id_login')) {
            $user = Admin::where('id', '=', $request->session()->get('id_login'))->first();
            if ($user->admin) {
                session()->put('isadmin', $user->admin);
                return $next($request);
            }
            else {
                abort(403);
            }
        }
        return $next($request);
    }
}
