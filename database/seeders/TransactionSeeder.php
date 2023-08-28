<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class TransactionSeeder extends Seeder
{

    public function run()
    {
        $faker = Faker::create();

        // Create 10 Fake Transactions
        foreach (range(1, 10) as $index) {
            $quantity = $faker->numberBetween(1, 5);
            $price = $faker->numberBetween(1000, 5000);
            $paymentAmount = $quantity * $price;

            DB::table('transactions')->insert([
                'reference_no' => 'INV202307' . $faker->unique()->randomNumber(5),
                'quantity' => $quantity,
                'price' => $price,
                'payment_amount' => $paymentAmount,
                'product_id' => $faker->numberBetween(1, 10),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}