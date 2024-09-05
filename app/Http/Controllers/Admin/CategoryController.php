<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.category.all');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:categories|max:50',
            'parent_id' => 'nullable|integer',
        ]);
        $success = Category::create($validated);
        if ($success) {
            session()->flash('success', 'Категория создана');
        } else {
            session()->flash('warning', 'Категория не была создана');
        }
        return redirect()->route('admin.category.index');
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
    public function edit(Category $category)
    {
        $parentName = ($category->parent) ? $category->parent->name : 'Нет родителя';
        return view('admin.category.edit', [
            'category' => $category,
            'parent_name' => $parentName,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        if ($category->products->isNotEmpty()) {
            session()->flash('warning', 'Категорию содержит продукты, редактирование не удалось');
            return redirect()->route('admin.category.index');
        } else {
            $validated = $request->validate([
                'name' => 'required|max:50',
                'parent_id' => 'nullable|integer',
            ]);
            $success = $category->update(
                ['name' => $validated['name'],
                    'parent_id' => $validated['parent_id'],
                ]
            );
            if ($success) {
                session()->flash('success', 'Новая категория изменна');
            } else {
                session()->flash('warning', 'Категорию изменить не удалось');
            }
            return redirect()->route('admin.category.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if ($category->products->isNotEmpty()) {
            session()->flash('warning', 'Категорию содержит продукты, удалить не удалось');
            return redirect()->route('admin.category.index');
        } else {
            $success = $category->delete();
            if ($success) {
                session()->flash('success', 'категория удалена');
            } else {
                session()->flash('warning', 'Категорию удалить не удалось');
            }
            return redirect()->back();
        }
    }
}
