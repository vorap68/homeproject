<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{

    /**
     * Метод подтверждения заказа
     * @var $order object активный(status = 0) заказ текущего пользователя
     * @var $fullSumm  double общая сумма по даному заказу
     */
    public function submit(Request $request)
    {
        $validated = $request->validate([
            'phone' => 'required|numeric',
        ]);
        $user = Auth::guard('sanctum')->user();
        $order = $user->orders()->where('status', 0)->first();
        $fullSumm = $order->getFullSumm($order);
        $success = $order->update([
            'email' => $user->email,
            'phone' => $validated['phone'],
            'summa' => $fullSumm,
            'status' => 1,
        ]);
        if ($success) {
            return response()->json([
                'message' => 'Order confirmed',
            ], 200);
        } else {
            return response()->json([
                'message' => 'Order Not confirmed',
            ], 400);
        }
    }

    /**
     * Метод возвращает все  заказы авторизированого пользователя
     * @var $orders collection все  заказы авторизированого пользователя
     * @var $count int количество заказов авторизированого пользователя
     * @var $orderProducts collection продукты в определеном заказе
     * @var $transformOrder array массив параметров заказа для фронта
     */
    public function allOrders()
    {

        $user = Auth::guard('sanctum')->user();
        $orders = $user->orders;
        $count = $user->orders->count();
        foreach ($orders as $order) {
            $fullSumm = $order->getFullSumm($order);
            $orderProducts = $order->products;
            $transformOrder[] = $orderProducts->map(function ($orderProducts) {
                return [
                    'name' => $orderProducts->name,
                    'count' => $orderProducts->pivot->count,
                ];
            });
        }
        return response()->json([
            'count your orders' => $count,
            'fullSumm' => $fullSumm,
            'order' => $transformOrder,
        ]);

    }
}
