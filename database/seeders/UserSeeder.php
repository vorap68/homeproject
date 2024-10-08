<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(20)->create();
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@com.org',
            'password' => Hash::make('123123123'),
            'role' => 'admin',
        ]);
    }
}
