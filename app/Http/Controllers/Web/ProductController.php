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
        // dd($product);
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
     * @var @categoryArray array массив выбранных категорий , если категория не выбрана,
     *  то категории в выборки продуктов не учавствуют (метод Product::when())
     *
     */
    public function productSearch(Request $request)
    {
        $categoryArray = $request->categories;
        $productSelected = Product::when($categoryArray, function ($query, $categoryArray) use ($request) {
            return $query = Product::whereIn('category_id', $categoryArray)->
                whereBetween('price', [$request->price_from, $request->price_to])->get();
        }, function ($query) use ($request) {
            return $query = Product::whereBetween('price', [$request->price_from, $request->price_to])
                ->get();
        });
        return view('product.selected', compact('productSelected'));

    }

}
