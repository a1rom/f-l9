<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Supplier>
 */
class SupplierFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->company,
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->unique()->e164PhoneNumber,
            'street' => $this->faker->streetAddress,
            'city' => $this->faker->city,
            'post_code' => $this->faker->postcode,
            'country' => $this->faker->country,
            'company_code' => $this->faker->unique()->ein,
        ];
    }
}
