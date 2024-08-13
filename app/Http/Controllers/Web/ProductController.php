<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    /**
     * Возвращает модель продукта и модель его свойств
     *
     */
    public function productSingle(Product $product)
    {
        $property = $product->property;
        return view('product.single', ([
            'product' => $product,
            'property' => $property,
        ]));
    }

    /**
     * Возвращает коллекцию всех продуктов
     *
     */
    public function productAll()
    {
        $products = Product::paginate(10);
        return view('product.all', compact('products'));
    }

    /**
     * Возвращает коллекцию  продуктов c учетом критериев выбора
     * @var @categoryArray array массив выбранных категорий или [1] если категории не выбрали
     */
    public function productSearch(Request $request)
    {
        $categoryArray = (!isset($request->categories) ? [1] : $request->categories);
        $productSelected = Product::whereIn('category_id', $categoryArray)->
            whereBetween('price', [$request->price_from, $request->price_to])->get();
        return view('product.selected', compact('productSelected'));

    }

}
