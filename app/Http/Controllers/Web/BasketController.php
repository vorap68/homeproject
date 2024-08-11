<?php

namespace App\Http\Controllers\Web;

use App\Classes\Basket;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class BasketController extends Controller
{

    /**
     * Запрос добавить продукт вызывает данный метод
     * @var object $basket объект нужен для создания нового заказа $order
     * или получения существующего из БД
     */
    public function add(Request $request, Product $product)
    {
        $basket = new Basket();
        $basket->add($product);
        return redirect()->back();
    }

    /**
     * Запрос уменьшить колмчество  продукт вызывает данный метод
     * @var object $basket объект нужен для создания нового заказа $order
     * или получения существующего из БД
     */
    public function minus(Product $product)
    {
        $basket = new Basket();
        $basket->minus($product);
        return redirect()->back();
    }

    /**
     * Метод выводит корзину текущего заказа
     */
    public function showBasket()
    {
        $order = Order::findOrFail(session('order_id'));
        return view('basket.show', compact('order'));
    }

    /**
     * Метод удаления  продукт  из текущего заказа
     */
    public function remove(Product $product)
    {
        $order = Order::find(session('order_id'));
        $order->products()->detach($product->id);
        return redirect()->back();

    }
}
