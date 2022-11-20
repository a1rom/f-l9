<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'product_category_id' => fake()->numberBetween(1, 5),
            'sku' => fake()->unique()->numerify('SKU-#######'),
            'ean' => fake()->unique()->ean13(),
            'description' => fake()->paragraph(),
        ];
    }
}
