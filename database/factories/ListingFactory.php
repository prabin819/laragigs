<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Listing>
 */
class ListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'title' => fake()->sentence(),//new way introduced in laravel 9
            'tags' => 'laravel, api, backend',
            'company' => fake()->company(),//old way => $this->faker->company()
            'email' => fake()->companyEmail(),
            'website' => fake()->url(),
            'location' => fake()->city(),
            'description' => fake()->paragraph(5)
        ];
    }
}
