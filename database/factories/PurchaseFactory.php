<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Purchase>
 */
class PurchaseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'date' => fake()->date(),
            'supplier_id' => fake()->numberBetween(1, 10),
            'product_id' => fake()->numberBetween(1, 10),
            'quantity' => fake()->numberBetween(1, 100),
            'price_vat_excl' => fake()->randomFloat(2, 0, 1000),
            'total_vat' => fake()->randomFloat(2, 0, 1000),
            'vat_id' => fake()->numberBetween(1, 5),
            'user_id' => fake()->numberBetween(1, 10),
        ];
    }
}
