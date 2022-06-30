<?php

namespace Database\Factories;

use App\Models\Room;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'booker_name' => fake()->name(),
            'check_in' => fake()->date(),
            'check_out' => fake()->date(),
            'nights' => fake()->randomNumber(1, true),
            'value' => fake()->randomNumber(6, true),
            'person' => fake()->randomNumber(2),
            'room_id' => Room::factory(),
        ];
    }
}
