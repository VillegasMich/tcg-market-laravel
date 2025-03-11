<?php

// AUTHOR: Manuel Villegas Michel

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TCGPackFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->randomElement([
                'Shrouded Fable',
                'Base Set',
                'Jungle',
                'Fossil',
                'Team Rocket',
                'Neo Genesis',
                'EX Ruby & Sapphire',
                'EX Deoxys',
                'Diamond & Pearl',
                'Platinum',
                'Black & White',
                'XY',
                'Sun & Moon',
                'Sword & Shield',
                'Scarlet & Violet',
            ]),
            'image' => 'pokemon_tcg_pack_default.png',
        ];
    }
}