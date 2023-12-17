<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'carTitle' => fake()->company(),
            'description' => fake()->text(),
            'published' => 1,
            'image' => fake()->imageUrl(800,600),
            'category_id' => fake()->numberBetween($min = 1, $max = 2),
        ];
    }
}
