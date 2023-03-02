<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ActiveMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next,$status)
    {
        $user = Auth::user();

        if ($user && $user->status == $status) {
            return $next($request);
        }

        // return redirect()->back()->withMessage('Sorry! Your account is inactive');
        auth()->logout();
        return redirect('/login')->with('message', 'your account is inactive');
    }
}
