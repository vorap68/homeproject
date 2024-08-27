<?php

namespace App\Http\Controllers\Api;

use App\Classes\Basket;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BasketController extends Controller
{
    /**
     * @var $api_id string заголовок запроса header('X-Session-Id')
     */
    public $api_id;

    /**
     * Метод добавляет продукт в корзину обращаясь к методу создания объекта корзина
     * В случае запроса с заголовком 'X-Session-Id возвращает на фронт
     *    переменную $api_id для сохранения в окружении Postman
     * Также проверяет наличие добавляемого продукта $product в БД
     */
    public function add(Request $request, $id)
    {
        $basket = $this->createBasket($request);
        $product = Product::find($id);
        if ($product) {
            $success = $basket->add($product);
        } else {
            return response()->json([
                'message' => 'This product not in shop',
                400,
            ]);
        }
        if ($success && $this->api_id) {
            return response()->json([
                'message' => 'Product added',
                'api_order_id' => $this->api_id,
            ], 200);
        } elseif ($success) {
            return response()->json([
                'message' => 'Product added',
            ], 200);
        } else {
            return response()->json([
                'message' => 'Product Not added',
            ], 400);
        }

    }

    /**
     * Метод уменьшает кол-во продукта на единицу в БД
     */
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

    /**
     * Метод вызывает создание  нового объекта-корзина
     * передавая в конструктор либо объект-пользователь
     * либо идентификатор неавторизированого пользователя
     * взятый из заголовка header(X-Session-id)
     * или сформированный в коде
     */
    public function createBasket($request)
    {
        if ($request->bearerToken()) {
            $user = Auth::guard('sanctum')->user();
            $basket = new Basket($user, null);
            return $basket;
        } elseif (empty($request->header('X-Session-Id'))) {
            $this->api_id = bin2hex(random_bytes(16));
            $basket = new Basket(null, $this->api_id);
            return $basket;
        } else {
            $this->api_id = $request->header('X-Session-Id');
            $basket = new Basket(null, $this->api_id);
            return $basket;
        }

    }

    /**
     * Метод отдает на фронт корзину с текущим заказом пользователя
     * набор переменных ($transformOrder) подбирается в коде
     * @var $transformOrder collection сформированный набор параметров для фронта
     */
    public function show(Request $request)
    {
        if ($request->user()) {
            $user = Auth::guard('sanctum')->user();
            $order = $user->orders()->where('status', 0)->first();
        } else {
            $order = Order::where('api_id', $request->header('X-Session-Id'))->where('status', 0)->first();
        }
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
