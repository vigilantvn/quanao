<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class admincontrol
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check()){
            $login=Auth::user();
            if($login->quyen==1)
                return $next($request);
            else
                return redirect('admin/login')->with('thongbao','khong co quyen Console');
        }
        else{
            return redirect('admin/login');
        }

    }
}
