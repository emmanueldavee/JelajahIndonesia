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
            // if user is not logged in
            request()->session()->flash('error', 'You must sign in first!');
            return redirect('/login');
        }

        if($request->user()->isAdmin()){
            // user is not the admin
            request()->session()->flash('error', 'Admins are unauthorized!');
            return redirect()->back();
        }

        // user is admin
        return $next($request);
    }
}
