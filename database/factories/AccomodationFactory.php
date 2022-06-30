<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Accomodation>
 */
class AccomodationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = fake()->company();
        $slug = str()->slug($name);
        return [
            'name' => $name,
            'slug' => $slug,
            'is_active' => true,
            'image_url' => fake()->imageUrl(),
            'contact_id' => Contact::factory(),
        ];
    }
}
