<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Profile;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
class ProfileMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next,$id)
    {
        $user = Auth::user();
        // $profiles=Profile::where('user_id','=',$user->id)->get();
        
        // if ($profiles &&  $user->role_id == $role1) {
        //     return $next($request);
        // }
        // return redirect()->back();
        // return view('home');


        if ($user && $user->role_id == $id) {
            return $next($request);
            // return view('dashboard.profile.update');
        }
        return redirect()->back();
    }
}
