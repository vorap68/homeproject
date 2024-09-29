<?php

namespace App\Http\Controllers\Spa;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ProductRequest;
use Illuminate\Http\Request;
use App\Models\Product;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        return view('index');
        //return Product::all();
    }

    public function store(ProductRequest $request)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['name']);
        $res = Product::create($data);
        return  $res;
    }

    public function update(ProductRequest $request, Product $product)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['name']);
        $product->update($data);
        return $product;
    }

    public function delete(Product $product)
    {
        $product->delete();
        return response([]);
    }
}
