<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'alrom',
            'email' => 'dev@alrom.de',
        ]);

        \App\Models\Supplier::factory(30)->create();
        \App\Models\ProductCategory::factory(6)->create();
        \App\Models\Product::factory(60)->create();
        \App\Models\Purchase::factory(10)->create();
    }
}
