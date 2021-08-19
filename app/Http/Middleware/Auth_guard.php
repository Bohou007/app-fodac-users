<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;

class Auth_guard
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
        if (Auth::user()->account_type != '') {
            if ($request->is('admin/*')) {
                return redirect()->route('admin.home');
            }else {
                return redirect()->route('compte.home');
            }
        }
        return $next($request);
    }
}
