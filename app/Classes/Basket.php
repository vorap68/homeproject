<?php

namespace App\Classes;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class Basket
{

    protected $order;

    /**
     * @var $user_id int индификатор пользователя
     *
     */
    public function __construct()
    {
        $user_id = Auth::check() ? Auth::user()->id : null;
        $order_id = session('order_id');
        if ($order_id) {
            $this->order = Order::findOrFail($order_id);
        } else {
            $this->order = Order::create([
                'user_id' => $user_id,
            ]);
            session(['order_id' => $this->order->id]);
        };
    }

    /**
     * Добавляет единицу товара в корзину
     *
     * @param object $product товар-добавляемый в корзину
     * @var int $countCurrent количество даного товара $product  в таблице order_product
     */
    public function add(Product $product)
    {
        if ($this->order->products->contains($product)) {
            $countCurrent = $this->order->products()->find($product->id)->pivot->count;
            $this->order->products()->updateExistingPivot($product->id, [
                'count' => ($countCurrent + 1),
            ]);
        } else {
            $this->order->products()->attach($product->id,
                [
                    'count' => 1,
                    'category_id' => $product->category->id,
                    'price' => $product->price,
                ]);
        }
        return redirect()->back();
    }

    /**
     * Удаляет единицу товара из корзины
     *
     * @param object $product товар-добавляемый в корзину
     * @var int $countCurrent количество даного товара $product  в таблице order_produect
     */
    public function minus(Product $product)
    {
        if ($this->order->products->contains($product)) {
            $countCurrent = $this->order->products()->find($product->id)->pivot->count;
            if ($countCurrent > 2) {
                $this->order->products()->updateExistingPivot($product->id, [
                    'count' => ($countCurrent - 1),
                ]);
            } else {
                $this->order->products()->detach($product->id);
            }
            return redirect()->back();
        }
    }

}
