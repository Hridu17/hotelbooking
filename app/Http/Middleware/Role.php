<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Role
{
    public function handle(Request $request, Closure $next, $role)
    {
        // Check if the user is authenticated and has the required role
        // if (Auth::check() && Auth::user()->role === $role) {
        //     return $next($request);
        // }

        // Redirect if the user does not have the required role
        // return redirect('/')->with('error', 'Access Denied!');
        if ($request->user()->role != $role) {
            return redirect('/');
        }
        return $next($request);
    }
}
