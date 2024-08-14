<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
      
        if (Auth::check() && Auth::user()->type) {
            return $next($request);
        }
        return redirect('/'); // Hoặc một trang khác nếu user không có quyền admin
       

    }
}
