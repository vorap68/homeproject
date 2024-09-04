<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;

class OrderController extends Controller
{

    /**
     * Метод возвращает все заказы
     */
    public function allOrders()
    {
        $orders = Order::all();
        return view('admin.order.all', compact('orders'));
    }

    /**
     * Метод возвращает все продукты текущего заказа
     */
    public function single(Order $order)
    {
        $products = $order->products;
        return view('admin.order.single', compact('products'));
    }

    public function destroy(Order $order)
    {

        $success = $order->delete();
        if ($success) {
            session()->flash('success', 'Заказ удален');
        } else {
            session()->flash('warning', 'Заказ удалить не удалось');
        }
        return redirect()->route('admin.order.all');

    }
}
