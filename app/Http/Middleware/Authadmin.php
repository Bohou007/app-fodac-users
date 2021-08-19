<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;

class Authadmin
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
        $profile = Auth::user()->account_type;
        if ($profile != 'staff' || $profile != 'consultant' || $profile != 'ADMIN') {
            return redirect()->route('login');
        }
        return $next($request);
    }
}
