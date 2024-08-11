<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    /**
     * Метод оформления заказа
     */
    public function place(Order $order)
    {
        return view('order.place', compact('order'));
    }

    /**
     * Метод подтверждения заказа
     */
    public function confirm(Request $request, Order $order)
    {
        $order->email = $request->email;
        $order->phone = $request->phone;
        $order->status = 1;
        $order->summa = $order->getFullSumm($order);
        $success = $order->save();
        if (!$success) {
            session()->flash('warning', 'Ваш заказ не может быть подтвержден');
            return redirect()->route('basket.show');
        } else {
            $request->session()->forget('order_id');
            return view('order.success', compact('order'));
        }

    }

}
