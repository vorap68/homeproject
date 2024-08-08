<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductController extends Controller
{

    /**
     * Возвращает модель продукта и коллекцию его свойств
     *
     */
    public function productSingle(Product $product)
    {
        $properties = $product->properties;
        // return view('product.single', ([
        //     'product' => $product,
        //     'properties' => $properties,
        // ]));
    }

    /**
     * Возвращает коллекцию всех продуктов
     *
     */
    public function productAll()
    {
        $products = Product::all();
        //return view('product.all',compact('products'));
    }

}
