<?php

namespace Database\Factories;

use App\Models\Plan;
use App\Models\Membership;
use Illuminate\Database\Eloquent\Factories\Factory;

class PlanFactory extends Factory
{
    protected $model = Plan::class;

    public function definition(): array
    {
        return [
            'membership_id' => Membership::factory(), // Creates a membership automatically
            'diet_plan' => $this->faker->randomElement(['Keto', 'Vegan', 'High Protein', 'Balanced', 'Custom']),
            'workout_plan' => $this->faker->randomElement(['Beginner', 'Intermediate', 'Advanced', 'Cardio Focused', 'Custom']),
        ];
    }
}
