<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Validation\ValidatesRequests;

class AuthMiddleware
{
    use ValidatesRequests;
    
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $this->validate($request, ['access_token' => 'required|size:32|exists:users']);
        if (!$request->user()->active) return response()->json(['success' => false, 'error' => trans('auth.not_confirmed_account')], 403);
        else if (!$request->user()) return response()->json(['success' => false, 'error' => trans('auth.token_expired')], 401);
        else return $next($request);
    }
}
