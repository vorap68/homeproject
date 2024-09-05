<?php

namespace App\Http\Controllers\Admin;

use App\Classes\ImageSaver;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductController extends Controller
{

    protected $imageSaver;

    public function __construct()
    {
        $this->imageSaver = new ImageSaver();
    }
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
    public function store(ProductRequest $request)
    {
        if ($request->picture) {
            $request['image'] = $this->imageSaver->upload($request);
        }
        $request['slug'] = Str::slug($request->name);
        $product_id = Product::create($request->all())->id;
        $success = DB::table('properties')->insert([
            'product_id' => $product_id,
            'color' => $request['color'],
            'size' => $request['size'],
            'state' => $request['state'],
        ]);
        if ($success && $product_id) {
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
    public function update(ProductRequest $request, Product $product)
    {
        if ($request->remove) {
            $removed = $this->imageSaver->remove($product);
            $request['image'] = null;
        }
        if ($request->picture) {
            $request['image'] = $this->imageSaver->upload($request);
        }
        $request['slug'] = Str::slug($request->name);
        $product->update($request->all());
        $successProduct = $product->save();
        dump($successProduct);
        DB::table('properties')->where('product_id', $product->id)->update([
            'color' => $request['color'],
            'size' => $request['size'],
            'state' => $request['state'],
        ]);
        if ($successProduct) {
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
