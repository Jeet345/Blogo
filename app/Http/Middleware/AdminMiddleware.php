<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        // $request->session()->put('admin', 1);
        // $request->session()->pull('admin');

        return $next($request);

        if ($request->session()->has('admin')) {
            return view('dashboard');
        }
    }
}
