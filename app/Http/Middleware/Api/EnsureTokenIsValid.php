<?php

namespace App\Http\Middleware\Api;

use Closure;
use Illuminate\Http\Request;

class EnsureTokenIsValid
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $token = $request->header('token');
        if ($token === null) {
            return response()->json([
                'message' => 'Token is missing',
            ], 400);
        }

        $user = \App\Models\User::where('api_token', $token)->first();
        if ($user === null) {
            return response()->json([
                'message' => 'Token is invalid',
            ], 401);
        }

        return $next($request);
    }
}
