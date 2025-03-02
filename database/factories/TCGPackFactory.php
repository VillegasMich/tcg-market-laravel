<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TCGPackFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->randomElement(['Sword & Shield', 'Vivid Voltage', 'Mystery Island']),
            'image' => 'pokemon_tcg_pack_default.png',
        ];
    }
}
