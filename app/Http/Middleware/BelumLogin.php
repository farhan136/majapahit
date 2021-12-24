<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class BelumLogin
{
    public function handle(Request $request, Closure $next)
    {
        if($request->session()->get('berhasil') == true){
            return redirect()->back();
        }
        return $next($request);
    }
}
