<?php

namespace App\Http\Middleware\Employees;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Employee
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
      //dd(Auth::user()->role);
        if (Auth::user()->role <> 'HRD') {
            return redirect(route('home'));
        } else {
            return $next($request);
        }

    }
}
