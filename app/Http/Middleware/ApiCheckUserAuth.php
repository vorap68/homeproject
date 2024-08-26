<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiCheckUserAuth
{
    /**
     * Метод проверяет наличие токена bearerToken в зоговке запроса
     * И при наличии токена находит пользователя этого токена
     * и добавляет объект пользователь к запросу
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $token = $request->bearerToken();
        if (!is_null($token)) {
            $user = Auth::guard('sanctum')->user();
            $request->setUserResolver(function () use ($user) {
                return $user;
            });
            // dd($token);
            return $next($request);
        }
        return $next($request);

    }
}
