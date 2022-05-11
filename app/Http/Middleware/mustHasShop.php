<?php

namespace App\Http\Middleware;

use App\Models\store;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class mustHasShop
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
        $shop=store::count('id');
        $userAdmin=User::count('id');
        if ($shop==0 || $userAdmin==0) {
            return redirect()->route('register.shop');
        } else {
            return $next($request);
        }
    }
}
