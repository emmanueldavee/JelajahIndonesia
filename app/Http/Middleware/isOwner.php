<?php

namespace App\Http\Middleware;

use Closure;

class isOwner
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

        if($request->post->user->id == auth()->user()->id){
            // if user is the owner of the article
            return $next($request);
        }

        // user is not the owner of the article
        request()->session()->flash('error', 'You are unauthorized!');
        return redirect('/login');
    }
}
