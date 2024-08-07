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

    /**
     * Возвращает коллекцию категорий ,вложеных в текущую
     */
    public function childrenCategories()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    /**
     * Возвращает коллекцию товаров текущей категоии
     */
    // public function products()
    // {
    //     return $this->hasMany(Product::class);
    // }

    /**
     * Возвращает название категории-родителя  для текущей категории
     */
    public function getParent($id)
    {
        $category = Category::find($id);
        $categoryParent = Category::find($category->parent_id);
        return $categoryParent->name;
    }
}
