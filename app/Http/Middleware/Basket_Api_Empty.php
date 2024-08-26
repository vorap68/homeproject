<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Basket_Api_Empty
{
    /**
     * Метод проверяет наличие активного заказа  для запроса пользователя с bearerToken
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
        if ($request->user()) {
            $userOrder = $request->user()->orders()->where('status', 0)->first();
            $userOrderProducts = $userOrder->products()->wherePivot('order_id', $userOrder->id)->get();
            if ($userOrderProducts->isNotEmpty()) {
                return $next($request);
            } else {
                return response()->json([
                    'message' => 'Your have not any basket',
                ]);
            }
        } else {
            session()->flash('warning', 'Корзина пустая');
            return redirect()->route('index');
        }
    }
}
