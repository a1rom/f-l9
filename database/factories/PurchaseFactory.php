<?php

namespace Database\Factories;

use App\Models\PurchasesItem;
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
        $items = PurchasesItem::factory()->count(3)->create();

        return [
            'date' => fake()->date(),
            'supplier_id' => fake()->numberBetween(1, 10),
            'user_id' => fake()->numberBetween(1, 10),
            'vat_id' => fake()->numberBetween(1, 10),
            'total_vat' => fake()->randomFloat(2, 1, 100),
        ];
    }
}
