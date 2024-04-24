<?php

namespace Database\Factories;

use App\Enums\TasksStatusEnums;
use App\Models\User;
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
    public function definition(): array
    {
        $statuses = TasksStatusEnums::getStatuses();

        return [
            'name' => fake()->sentence,
            'due_date' => fake()->date,
            'description' => fake()->paragraph,
            'user_id' => User::first()->id,
            'status' => rand(0, count($statuses) - 1),
        ];
    }
}
