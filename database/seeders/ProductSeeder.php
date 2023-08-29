<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Create 10 Fake Products
        foreach (range(1, 25) as $index) {
            DB::table('products')->insert([
                'name' => $faker->unique()->word . ' Product',
                'price' => $faker->numberBetween(1000, 5000),
                'stock' => $faker->numberBetween(10, 100),
                'description' => $faker->sentence,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}