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
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(6),
            'description' => implode(PHP_EOL, $this->faker->sentences(3)),
            'price' => $this->faker->randomNumber(6),
            'price_discount' => $this->faker->randomNumber(5),
            'quantity' => $this->faker->randomNumber(3)
        ];
    }
}
