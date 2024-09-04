<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     * @var object $category категория для которой создается продукт
     *
     * @return array
     */
    public function definition()
    {
        $category = Category::whereNotNull('parent_id')->inRandomOrder()->first();
        $name = $this->faker->name;
        $slug = Str::slug($name);
        // Сохранение тестовой картинки с именим слага продукта в папке в названием категории продукта
        Storage::copy('images/test.jpeg', 'images/' . $category->name . '/150_' . $slug . '.jpeg');
        Storage::copy('images/test.jpeg', 'images/' . $category->name . '/600_' . $slug . '.jpeg');
        return [
            'name' => $name,
            'descriptions' => $this->faker->text,
            'slug' => $slug,
            'price' => rand(10, 100),
            'count' => rand(5, 50),
            'category_id' => $category->id,
            'image' => $slug . '.jpeg',

        ];
    }
}
