<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
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
            'email' => 'nullable|email',
        ]);
        if ($request->user()) {
            $user = $request->user();
            $order = Order::where([
                'user_id' => $user->id,
                'status' => 0,
            ])->firstOrFail();
            $order->email = $user->email;
            $order->phone = $validated['phone'];
            $order->summa = $order->getFullSumm($order);
            $order->status = 1;
            $success = $order->save();
        } else {
            $api_id = $request->header('X-Session-Id');
            $order = Order::where('api_id', $api_id)->first();
            $order->email = $validated['email'];
            $order->phone = $validated['phone'];
            $order->summa = $order->getFullSumm($order);
            $order->status = 1;
            $success = $order->save();
        }
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
            $dateOrder = $order->created_at->format('d/m/Y');
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
