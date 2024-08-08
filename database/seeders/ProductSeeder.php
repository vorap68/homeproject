<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Property;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = Product::factory(30)->
            has(Property::factory())->create();
    }
}
