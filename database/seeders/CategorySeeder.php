<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //   $categories = Category::factory(5)->create();
        DB::table('categories')->insert([
            [
                'name' => 'category1',
                'parent_id' => null,
            ],
            [
                'name' => 'category2',
                'parent_id' => null,
            ],
            [
                'name' => 'category3',
                'parent_id' => 1,
            ],
            [
                'name' => 'category4',
                'parent_id' => 2,
            ],
            [
                'name' => 'category5',
                'parent_id' => 1,
            ],
            [
                'name' => 'category6',
                'parent_id' => 2,
            ],
            [
                'name' => 'category7',
                'parent_id' => 3,
            ],
            [
                'name' => 'category8',
                'parent_id' => 4,
            ],
            [
                'name' => 'category9',
                'parent_id' => 3,
            ],
            [
                'name' => 'category10',
                'parent_id' => 4,
            ],
        ]);
    }
}
