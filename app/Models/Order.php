<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'email', 'phone', 'summa', 'status', 'api_id',
    ];

    /**
     * Связь с продуктами заказа через промежут таблицу
     */
    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('count', 'price', 'category_id')->withTimestamps();
    }

    /**
     * Расчет общей суммы текущего заказа по всем продуктам
     */
    public function getFullSumm(Order $order)
    {
        $summa = 0;
        foreach ($order->products as $order_product) {
            $summa += $order_product->pivot->count * $order_product->price;
        }
        return $summa;
    }

}
