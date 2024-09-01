<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use Symfony\Component\HttpFoundation\Response;
use App\Models\Admin;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if($request->path()=="hospital/management"){
            if(auth()->guard('admin')->user()){
                // this is the admin page
                return redirect("/admin/page");
            }
        }
        if(auth()->user()){
            return redirect("/");
        }
        return $next($request);
    }
}
