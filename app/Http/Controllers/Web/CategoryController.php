<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{

    /**
     * Возвращает коллекцию продуктов текущей категории
     */
    public function getCategory(Category $category)
    {
        $products = $category->products;
        dd($products);
    }
}
