<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'total' => fake()->numberBetween($min = 1, $max = 10),
            'status' => fake()->randomElement(['pending', 'processing', 'shipped', 'delivered', 'cancelled', 'failed', 'hold']),
            'paymentMethod' => fake()->randomElement(['cash', 'card']),
            'user_id' => User::factory(),
        ];
    }
}
