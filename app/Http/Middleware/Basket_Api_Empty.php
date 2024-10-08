<?php

namespace App\Http\Middleware;

use App\Models\Order;
use Closure;
use Illuminate\Http\Request;

class Basket_Api_Empty
{
    /**
     * Метод проверяет наличие активного заказа  для запроса пользователя с bearerToken
     * и для пользователя в запросе от которого есть header('X-Session-d')
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        /**
         * @var $userOrder object активный заказ пользователя
         * @var $userOrderProducts collection продукты для данного заказа ($userOrder) текущего пользователя
         */
        // проверка для пользователя с bearerToken
        if ($request->user()) {
            $userOrder = $request->user()->orders()->where('status', 0)->first();
            if (!$userOrder) {
                return response()->json([
                    'message' => 'Your have not any orders',
                ]);
            };
            $userOrderProducts = $userOrder->products()->wherePivot('order_id', $userOrder->id)->get();

            if ($userOrderProducts->isNotEmpty()) {
                return $next($request);
            } else {
                return response()->json([
                    'message' => 'Your have not any basket',
                ]);
            }
            // проверка для пользователя с bearerToken
        } elseif ($request->header('X-Session-Id')) {
            $userOrder = Order::where('api_id', $request->header('X-Session-Id'))->where('status', 0)->first();
            if (!$userOrder) {
                return response()->json([
                    'message' => 'Your have not any orders',
                ]);
            };
            $userOrderProducts = $userOrder->products()->wherePivot('order_id', $userOrder->id)->get();

            if ($userOrderProducts->isNotEmpty()) {
                return $next($request);
            } else {
                return response()->json([
                    'message' => 'Your have not any basket',
                ]);
            }
        } else {
            return response()->json([
                'message' => 'You need login',
            ]);
        }
    }
}
