<?php

namespace App\Classes;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ImageSaver extends Controller
{

    public function upload(Request $request)
    {
        $file = $request->file('picture');
        $fileName = $file->getClientOriginalName();
        $fileName = str_replace(' ', '_', $fileName);
        $image600 = Image::make($file)->resize(600, 600, function ($checked) {
            $checked->aspectRatio();
            $checked->upsize();
        });
        $category_name = Category::find($request->category_id)->name;
        $image150 = Image::make($file)->resize(150, 150, function ($checked) {
            $checked->aspectRatio();
            $checked->upsize();
        });
        $path = storage_path('app/public/images/' . $category_name);
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
        $success600 = $image600->save($path . '/600_' . $fileName);
        $success150 = $image150->save($path . '/150_' . $fileName);
        if ($success150 && $success600) {
            return $fileName;
        } else {
            session()->flash('warning', 'Изображение не сохранилось');
            return route('admin.product.store');
        }
    }

    public function remove(Product $product)
    {
        $path = 'images/' . $product->category->name;
        $fileName = $product->image;
        $success150 = Storage::delete($path . '/150_' . $fileName);
        $success600 = Storage::delete($path . '/600_' . $fileName);
        if ($success150 && $success600) {
            return true;
        } else {
            session()->flash('warning', 'Изображение не удалено');
            return route('admin.product.update');
        }
    }
}
