<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class WishListFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
        ];
    }
}
