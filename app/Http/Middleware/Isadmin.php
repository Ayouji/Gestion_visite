<?php

namespace App\Http\Middleware;

use App\Models\Admin;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class IsAdmin
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
        if ($request->session()->has('id_login')) {
            $user = Admin::where('id', $request->session()->get('id_login'))->first();
            if ($user && $user->admin) {
                session()->put('isadmin', $user->admin);
                return $next($request);
            } else {
                //abort(403);
                return Redirect::route('auth.create')->with('error', 'You do not have access !!!!');
            }
        }
        return Redirect::route('auth.create')->with('error', 'You do not have access !!!!');
    }
}
