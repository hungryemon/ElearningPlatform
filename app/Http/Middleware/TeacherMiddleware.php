<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class TeacherMiddleware
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
        if(Auth::guard('teacher')->check()){
            if(!Auth::guard('teacher')->user()->isActive){
                return redirect()->route('mentor.success');
            }
            return $next($request);
        }
        return redirect()->route('mentor.login');
    }
}
