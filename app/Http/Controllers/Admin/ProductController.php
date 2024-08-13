<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(10);
        return view('admin.product.all', compact('products'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request['slug'] = Str::slug($request->name);
        $validated = $request->validate([
            'name' => 'required|max:50',
            'descriptions' => 'nullable',
            'slug' => 'required|max:200',
            'count' => 'required|numeric',
            'price' => 'required|numeric',
            'category_id' => 'required|numeric',

        ]);
        $success = Product::create($validated);
        if ($success) {
            session()->flash('success', 'Новый продукт создан');
        } else {
            session()->flash('warning', 'Продукт создать не удалось');
        }
        return redirect()->route('admin.product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('admin.product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request['slug'] = Str::slug($request->name);
        $validated = $request->validate([
            'name' => 'required|max:50',
            'descriptions' => 'nullable',
            'slug' => 'required|max:200',
            'count' => 'required|numeric',
            'price' => 'required|numeric',
            'category_id' => 'required|numeric',

        ]);
        $product->update($validated);
        $success = $product->save();
        if ($success) {
            session()->flash('success', 'Продукт отредактирован');
        } else {
            session()->flash('warning', 'Продукт отредактировать не удалось');
        }
        return redirect()->route('product', compact('product'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $success = $product->delete();
        if ($success) {
            session()->flash('success', 'Продукт удален');
        } else {
            session()->flash('warning', 'Продукт удалить не удалось');
        }
        return redirect()->route('admin.product.index');

    }
}
