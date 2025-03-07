<?php

// AUTHOR: Manuel Villegas Michel

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TCGPackFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->randomElement(['Shrouded Fable']),
            'image' => 'pokemon_tcg_pack_default.png',
        ];
    }
}
