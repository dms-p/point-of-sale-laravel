<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class isAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next,$role)
    {
        if (Auth::user()->role->name==$role) {
            return $next($request);
        }else{
            if (Auth::user()->role->name=='Admin') {
                $redirect=redirect()->route('dashboard');
            }
            else{
                $redirect=redirect()->route('dashboard.cashier');
            }
            return $redirect;
        }
    }
}
