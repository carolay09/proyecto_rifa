<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(StateSeeder::class);
        // $this->call(CategorySeeder::class);
        // Product::factory(3)->create();
        // $this->call(RaffleSeeder::class);
        $this->call(RolSeeder::class);
        $this->call(UserSeeder::class);
    }
}
