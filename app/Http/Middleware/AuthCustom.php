<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AuthCustom
{
    public function handle(Request $request, Closure $next)
    {
        if (!Session::get('login')) {
            return redirect()->route('login')
                ->withErrors(['login' => 'Silakan login terlebih dahulu']);
        }

        return $next($request);
    }
}
