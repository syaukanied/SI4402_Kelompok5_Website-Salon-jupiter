<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthorizedUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $guard)
    {
        if($guard === 'web' && !Auth::guard($guard)->check()) {
            return redirect()->to(route('home'));
        }

        if($guard === 'web_barber' && !Auth::guard($guard)->check()) {
            return redirect()->to(route('home'));
        }

        return $next($request);
    }
}
