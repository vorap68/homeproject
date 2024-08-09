<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'email', 'phone', 'summa', 'status',
    ];

    /**
     * Связь с продуктами заказа через промежут таблицу
     */
    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('count', 'price', 'category_id')->withTimestamps();
    }

}
