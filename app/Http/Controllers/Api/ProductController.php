<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\ProductResource;
use App\Models\Category;
use App\Models\Product;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    /**
     * Метод возвращает коллекцию всех продуктов
     */
    public function getAll()
    {
        $products = Product::all();
        //return json_encode($products);
        return ProductResource::collection($products);
    }

    /**
     * Метод возвращает коллекцию выбранных  продуктов
     * в качестве критериев выборки категории и цена -обязателные параметры выборки
     * свойства необязательные
     */
    public function getSelected(Request $request)
    {

        $validated = $request->validate(
            [
                'category' => 'required|max:200',
                'price_from' => 'required|numeric',
                'price_to' => 'required|numeric',
                'color' => ['nullable', Rule::in(['yellow', 'green', 'red'])],
                'size' => ['nullable', Rule::in(['small', 'large', 'middle'])],
                'state' => ['nullable', Rule::in(['new', 'secondHand', 'undefined'])],
            ]
        );

        /**
         * @var $category_id массив категорий состоящий из id выбраных категорий
         */
        $category_id = Category::whereIn('name', $validated['category'])->pluck('id')->toArray();

        /**
         * @var $properties массив product_id из таблицы свойств,  отвечающий условиям выборки свойств продукта
         */
        $properties = DB::table('properties')->
            where('color', isset($validated['color']) ? $validated['color'] : DB::raw('color'))->
            where('size', isset($validated['size']) ? $validated['size'] : DB::raw('size'))->
            where('state', isset($validated['state']) ? $validated['state'] : DB::raw('state'))->
            pluck('product_id')->toArray();

        /**
         * @var $products ококнчательный массив состоящий из id выбраных продуктов
         */
        $products = Product::whereIn('category_id', $category_id)->
            whereBetween('price', [$validated['price_from'], $validated['price_to']])->
            find($properties);

        return ProductResource::collection($products);

    }

    /**
     * Метод возвращет продукт по его slug
     */
    public function slug($slug)
    {
        $product = Product::where('slug', $slug)->get();
        return ProductResource::collection($product);
    }

    /**
     * Метод меняет свойства товара (добавляет, удаляет)
     * @var $property object наброр свойств для переданого продукта
     */
    public function changeProperty(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|numeric',
            'color' => 'nullable|string',
            'size' => 'nullable|string',
            'state' => 'nullable|string',
        ]);
        $property = Property::where('product_id', $validated['product_id'])->firstOrFail();
        $success = $property->update([
            'color' => $validated['color'],
            'size' => $validated['size'],
            'state' => $validated['state'],
        ]);

        if ($success) {
            return response()->json([
                'message' => 'properties were updated ',
            ]);
        } else {
            return response()->json([
                'message' => 'properties were NOT updated ',
            ]);
        }
    }
}
