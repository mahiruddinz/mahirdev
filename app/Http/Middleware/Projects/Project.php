<?php

namespace App\Http\Middleware\Projects;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Project
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
        if (in_array(Auth::user()->role, ['Project', 'Leader Project', 'Operator']) == false) {
            return redirect(route('home'));
        } else {
            return $next($request);
        }
    }
}
