<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CekSessionMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if($request->session()->get('berhasil') == true){
            return $next($request);
        }else{
            return redirect('/');
        }
    }
}
