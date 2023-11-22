<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ApiChkToken
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
        $arr = $request->all();
        $arr['Token'] = $request->bearerToken();
        Log::debug($request->ip(), $arr);
        if(!($request->bearerToken() === env('APP_AUTHORIZATION_KEY', 'l23kij45gvi12j44f8i09'))) {
            return response()->json([
                'code' => 'E02'
            ], 401);
        }

        return $next($request);
    }
}
