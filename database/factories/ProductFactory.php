<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $category = Category::whereNotNull('parent_id')->inRandomOrder()->first();
        $name = $this->faker->name;
        return [
            'name' => $name,
            'descriptions' => $this->faker->text,
            'slug' => Str::slug($name),
            'price' => rand(10, 100),
            'count' => rand(5, 50),
            'category_id' => $category->id,

        ];
    }
}
