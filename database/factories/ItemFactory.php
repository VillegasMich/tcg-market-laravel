<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\TCGCard;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    public function definition(): array
    {
        return [
            'quantity' => $this->faker->numberBetween($min = 1, $max = 100),
            'subtotal' => $this->faker->numberBetween($min = 3000, $max = 1000000),
            'order_id' => Order::factory(),
            't_c_g_card_id' => TCGCard::factory(),
        ];
    }
}
