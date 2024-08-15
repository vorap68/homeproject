<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::inRandomOrder()->first();
        $product = Product::inRandomOrder()->first();
        $count = rand(1, 50);
        Order::factory(1)->
            hasAttached($product, [
            'product_id' => $product->id,
            'price' => $product->price,
            'count' => $count,
            'category_id' => $product->category_id,
        ]);
    }
}
