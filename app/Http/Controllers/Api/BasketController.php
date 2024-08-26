<?php

namespace App\Http\Controllers\Api;

use App\Classes\Basket;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BasketController extends Controller
{
    public function add(Request $request, $id)
    {
        $basket = $this->createBasket($request);
        $product = Product::find($id);
        $success = $basket->add($product);
        if ($success) {
            return response()->json([
                'message' => 'Product added',
            ], 200);
        } else {
            return response()->json([
                'message' => 'Product Not added',
            ], 400);
        }

    }

    public function minus(Request $request, $id)
    {
        $basket = $this->createBasket($request);
        $product = Product::find($id);

        $success = $basket->minus($product);
        if ($success) {
            return response()->json([
                'message' => 'Product removed',
            ], 200);
        } else {
            return response()->json([
                'message' => 'Product Not removed',
            ], 400);
        }

    }

    public function createBasket($request)
    {
        $user = Auth::guard('sanctum')->user();
        $basket = new Basket($user);
        return $basket;
    }

    public function show(Request $request)
    {
        $user = Auth::guard('sanctum')->user();
        $order = $user->orders()->where('status', 0)->first();
        $fullSumm = $order->getFullSumm($order);
        $orderProducts = $order->products;
        $transformOrder = $orderProducts->map(function ($orderProducts) {
            return [
                'product_id' => $orderProducts->pivot->product_id,
                'name' => $orderProducts->name,
                'price' => $orderProducts->price,
                'count' => $orderProducts->pivot->count,
            ];
        });
        return response()->json([
            'fullsum' => $fullSumm,
            'products' => $transformOrder,
        ]);

    }
}
