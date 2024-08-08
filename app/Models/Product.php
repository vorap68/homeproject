<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'descriptions', 'price', 'count', 'category_id', 'slug',
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
    public function properties()
    {
        return $this->hasMany(Property::class);
    }

}
