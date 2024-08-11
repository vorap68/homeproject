<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Is_basket_empty_web
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
            return $next($request);
        } else {
            session()->flash('warning', 'Корзина пустая');
            return redirect()->route('index');
        }
    }
}
