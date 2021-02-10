<?php

namespace App\Http\Middleware;

use Closure;

class isAdmin
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
            // if user is not logged in
            request()->session()->flash('error', 'You must sign in first!');
            return redirect('/login');
        }

        if($request->user()->isAdmin()){
            // user is not the admin
            return $next($request);
        }

        // user is admin
        request()->session()->flash('error', 'Users are unauthorized!');
        return redirect()->back();
    }
}
