<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PurchasesItem>
 */
class PurchasesItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $qty = fake()->numberBetween(1, 100);
        $priceVatExcl = fake()->randomFloat(2, 1, 60);
        $vatRate = fake()->numberBetween(19, 23);
        $totalVatExcl = $qty * $priceVatExcl;
        $totalVat = $totalVatExcl * (1 + $vatRate / 100) - $totalVatExcl;

        return [
            'purchase_id' => fake()->numberBetween(1, 10),
            'product_id' => fake()->numberBetween(1, 10),
            'quantity' => $qty,
            'price_vat_excl' => $priceVatExcl,
            'total_vat' => $totalVat,
            'vat_id' => fake()->numberBetween(1, 5),
        ];
    }
}
