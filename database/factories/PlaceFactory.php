<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class PlaceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->company(),
            'description' => fake()->paragraph(),
            'priceFrom' => fake()->randomDigit(),
            'priceTo' => fake()->randomDigit(),
            'image' => fake()->imageUrl(800,600),
            'created_at'=> fake()->dateTime(),
        ];
    }
}
