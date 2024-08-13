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
        $products = $category->products()->paginate(10);
        return view('product.all', compact('products'));
    }
}
