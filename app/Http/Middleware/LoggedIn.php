<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoggedIn
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            if (Auth::user()->role == 'member' && Auth::user()->accountStatus == 'new' && !(request()->is('welcome') || request()->is('updateSelected') || request()->is('updatePreferences') || request()->is('logout'))) {
                return redirect('welcome');
            }
            return $next($request);
        }
        return abort(401);
    }
}
