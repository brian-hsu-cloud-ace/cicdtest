<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckApiToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {   
        if ( $request->header('Api-Token') == env('API_TOKEN') ){
            return $next($request);
        }else{
            return response()->json
            (
                [
                    'error' => 
                    [
                        'code' => 401,
                        'message' => 'denial',
                        'status' => 'UNAUTHENTICATED',
                        'message' => 'denial',
                    ]
                ]
            );
        }
    }
}
