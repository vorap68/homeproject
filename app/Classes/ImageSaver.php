<?php

namespace App\Classes;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

//use Intervention\Image\Facades\Image;

//use Intervention\Image\Image;

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
}
