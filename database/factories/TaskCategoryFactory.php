<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TaskCategory>
 */
class TaskCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $statuses = [false, true];
        $taskCategories = ["Design", "Planning", "Development", "Testing", "Deployment"];
        return [
            'title' => $taskCategories[rand(0, count($taskCategories) - 1)],
            'status' => $statuses[rand(0, count($statuses) - 1)],    
        ];
    }
}
