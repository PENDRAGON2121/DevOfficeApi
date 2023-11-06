<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
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
            'review' => $this->faker->text(),
            'user_id' => $this->faker->numberBetween(1, 10),
            'office_id' => $this->faker->numberBetween(1, 10),

        ];
    }
}
