<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeShareMiddleware
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
        if(Auth::check()){
            // tài khoản chưa xóa 
            if(Auth::user()->Xoa == 1 ){
                Auth::logout();
                return redirect('dangnhap');
            }

            view()->share('user_login', Auth::user());
            return $next($request);
        }
        
        return $next($request);
    }
}
