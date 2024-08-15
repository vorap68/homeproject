<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Seeder;

class OrderProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = Product::all();
        // dump($products1);
        // $products = Product::factory()->count(2)->create();
        //  dd($products);
        // Создаем несколько продуктов

        // Создаем несколько заказов и связываем их с продуктами
        Order::factory()->count(10)->create()->each(function ($order) use ($products) {
            $orderProducts = $products->random(3);
            $fullsum = 0;
            foreach ($orderProducts as $product) {
                $count = rand(1, 5);
                $fullsum += $product->price * $count;
                $order->products()->attach(
                    $product->id,

                    [
                        'count' => $count,
                        'price' => $product->price,
                        'category_id' => $product->category->id,
                    ]
                );
            }

            $order->summa = $fullsum;
            $order->save();
        });
    }
}
