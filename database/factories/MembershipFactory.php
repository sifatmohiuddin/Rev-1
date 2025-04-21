<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Membership>
 */
class MembershipFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
{
    return [
        'name' => $this->faker->name,
        'phone' => $this->faker->phoneNumber,
        'age' => $this->faker->numberBetween(18, 60),
        'gender' => $this->faker->randomElement(['male', 'female', 'other']),
        'current_body_type' => $this->faker->randomElement(['Lean', 'Skinny', 'Fit', 'Overweight', 'Obbesse', 'Highly-Obsessed']),
        'desired_body_type' => $this->faker->randomElement(['type1', 'type2', 'type3', 'type4', 'type5', 'type6']),
        'weight' => $this->faker->randomFloat(1, 50, 100),
        'target_weight' => $this->faker->randomFloat(1, 50, 100),
        'height' => $this->faker->numberBetween(150, 200),
        'workout_time' => $this->faker->randomElement(['morning', 'afternoon', 'evening']),
        'medical_history' => $this->faker->optional()->sentence,
        'membership_plan' => $this->faker->randomElement([1, 3, 6]),
    ];
}

}
