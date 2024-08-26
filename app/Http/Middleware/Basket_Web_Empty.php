<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Basket_Web_Empty
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
        $order_id = session('order_id');

        if ($order_id) {
            $currentOrder = DB::table('order_product')->where('order_id', $order_id)->get();
            if ($currentOrder->isNotEmpty()) {
                return $next($request);
            }
        }
        session()->flash('warning', 'Корзина пустая');
        return redirect()->route('index');

    }
}
