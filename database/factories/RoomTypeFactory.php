<?php

namespace Database\Factories;

use App\Models\Accomodation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RoomType>
 */
class RoomTypeFactory extends Factory
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
            'price' => fake()->randomNumber(5, true),
            'bed' => fake()->numberBetween(1, 2),
            'bed_size' => fake()->word(),
            'accomodation_id' => Accomodation::factory(),
        ];
    }
}
