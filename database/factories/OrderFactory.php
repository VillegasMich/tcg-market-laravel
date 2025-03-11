<?php

// Author: Miguel Vasquez Bojanini.

namespace Database\Factories;

use App\Models\Item;
use App\Models\Order;
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
            'status' => fake()->randomElement(['pending', 'processing', 'shipped', 'delivered', 'cancelled', 'failed', 'on hold']),
            'paymentMethod' => fake()->randomElement(['cash', 'card']),
        ];
    }

    /**
     * Configures the factory to execute the command after creating one User.
     */
    public function configure(): static
    {
        return $this->afterCreating(function (Order $order) {
            Item::factory()->count(rand(1, 3))->create([
                'order_id' => $order->getId(),
            ]);
        });
    }
}