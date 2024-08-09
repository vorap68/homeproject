<?php

namespace App\Http\Controllers\Web;

use App\Classes\Basket;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class BasketController extends Controller
{

    /**
     * Запрос добавить товар вызывает данный метод
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
     * Запрос удалить товар вызывает данный метод
     * @var object $basket объект нужен для создания нового заказа $order
     * или получения существующего из БД
     */
    public function minus(Product $product)
    {
        $basket = new Basket();
        $basket->minus($product);
        return redirect()->route('index');
    }

    public function showBasket()
    {

    }

}
