<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $dateSegments = ["20231031", "20241101", "20241225", "20250101", "20240615", "20240520"];
        $types = [ 'photo', 'image', 'poster' ];
        $device = [ 'laptop', 'phone', 'tablet', 'desktop' ];

        return [
            'filename' => implode('-', [
                $this->faker->randomElement($device),
                $this->faker->randomElement($types),
                $this->faker->randomElement($dateSegments),
            ]) . '.' . $this->faker->randomElement([ 'jpg', 'png', 'webp' ])
        ];
    }
}
