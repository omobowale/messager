<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->name(),
            'category_id' => rand(1, 3),
            'status_id' => rand(1, 3),
            'user_id' => rand(1, 3),
            'deadline' => date("d-m-Y", mktime(rand(1, 10), rand(1, 20), rand(1, 40), rand(1, 6), rand(1, 30), 2022)),
        ];
    }
}
