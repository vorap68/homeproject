<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'parent_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    /**
     * Возвращает коллекцию категорий , вложеных в текущую те детей
     */
    public function childrenCategories()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    /**
     * Возвращает родителя текущей категории
     */
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    /**
     * Возвращает коллекцию товаров текущей категоии
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }

}
