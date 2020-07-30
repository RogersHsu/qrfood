<?php

namespace App\Http\Middleware;

use Closure;
use Tymon\JWTAuth\Facades\JWTAuth;

class JWTMiddleware
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
        try{
            if(JWTAuth::parseToken()->authenticate() == false){
                return response()->json([
                    'success' => false,
                    'message' => "無此使用者"
                ]);
            }else{
                return $next($request);
            }
        }catch (\Exception $e){
            return response()->json([
                'success' => false,
               'message' => '驗證錯誤',
            ]);
        }
    }
}
