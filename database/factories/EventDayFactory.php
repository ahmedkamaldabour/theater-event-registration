<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use function rand;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EventDay>
 */
class EventDayFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'movie_id' => rand(1, 10),
            'show_time_id' => rand(1, 3),
            'date_id' => rand(1, 10),
        ];
    }
}
