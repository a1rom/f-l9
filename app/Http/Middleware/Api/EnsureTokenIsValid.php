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
            $code = 400;
            return response()->json(answerWithData('Token is missing', $code), $code);
        }

        $user = \App\Models\User::where('api_token', $token)->first();
        if ($user === null) {
            $code = 401;
            return response()->json(answerWithData('Token is invalid', $code), $code);
        }

        return $next($request);
    }
}
