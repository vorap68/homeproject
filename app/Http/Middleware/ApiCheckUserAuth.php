<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiCheckUserAuth
{
    /**
     * Метод проверяет
     * 1-наличие токена bearerToken в заголовке запроса
     *   при наличии токена находит пользователя этого токена
     *     и добавляет объект пользователь к запросу
     * 2- проверяет наличие заголовка 'X-Session-Id'
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $token = $request->bearerToken();
        $api_order_id = $request->header('X-Session-Id');
        if (!is_null($token)) {
            $user = Auth::guard('sanctum')->user();
            $request->setUserResolver(function () use ($user) {
                return $user;
            });
            return $next($request);
        } elseif (!is_null($api_order_id)) {
            return $next($request);
        }
        return response()->json([
            'message' => 'You need login',
        ]);
    }
}
