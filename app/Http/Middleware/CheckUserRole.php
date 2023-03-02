<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    
    public function handle($request, Closure $next, $role1,$role2)
    {
        $user = Auth::user();

        if ($user && $user->role_id == $role1 || $user->role_id == $role2) {
            return $next($request);
        }

        return redirect()->back();
        
        // if (!$user || !in_array($user->role_id, $role)) {
        //     abort(403, 'Unauthorized action.');
        // }

        // return $next($request);
    }
}
