<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'descriptions', 'price', 'count', 'category_id', 'slug', 'image',
    ];

    /**
     * Возвращает модель категории у которой принадлежит текущий продукт
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

/**
 * Возвращает коллекцию свойств для текущего продукта
 */
    public function property()
    {
        return $this->hasOne(Property::class);
    }

    /**
     *  Связь с заказами заказа через промежут таблицу
     */
    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }

}
