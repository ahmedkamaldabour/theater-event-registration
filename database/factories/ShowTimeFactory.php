<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ShowTime>
 */
class ShowTimeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $start_time = $this->faker->time();
        $end_time = Carbon::parse($start_time)->addMinutes(120)->format('H:i:s');
        return [
            'start_time' => $start_time,
            'end_time' => $end_time
        ];
    }
}
