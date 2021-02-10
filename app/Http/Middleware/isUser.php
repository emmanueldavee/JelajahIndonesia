<?php

namespace App\Http\Middleware;

use Closure;

class isUser
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
        if(!$request->user()){
            request()->session()->flash('error', 'You must sign in first!');
            return redirect('/login');
        }

        if($request->user()->isAdmin()){
            request()->session()->flash('error', 'Admins are unauthorized!');
            return redirect()->back();
        }

        return $next($request);
    }
}
