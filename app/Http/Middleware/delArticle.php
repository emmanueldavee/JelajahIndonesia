<?php

namespace App\Http\Middleware;

use Closure;

class delArticle
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

        if($request->user()->isAdmin() || $request->route('article')->user->id == auth()->user()->id){
            // user is either admin or owner of the article
            return $next($request);
        }

        // user is admin
        request()->session()->flash('error', 'You are unauthorized!');
        return redirect()->back();
    }
}
