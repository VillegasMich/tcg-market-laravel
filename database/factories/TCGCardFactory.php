<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TCGCardFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->randomElement([
                'Bulbasaur',
                'Ivysaur',
                'Charmander',
                'Charizard',
                'Squirtle',
                'Blastoise',
                'Pikachu',
                'Raichu',
                'Eevee',
                'Vaporeon',
                'Jolteon',
                'Flareon',
                'Mewtwo',
                'Mew',
                'Gyarados',
                'Magikarp',
                'Snorlax',
                'Gengar',
                'Arcanine',
                'Articuno',
                'Zapdos',
                'Moltres',
                'Dragonite',
                'Tyranitar',
                'Gardevoir',
                'Salamence',
                'Metagross',
                'Lucario',
                'Garchomp',
            ]),
            'description' => $this->faker->text(20),

            'franchise' => 'Pokemon',
            'price' => $this->faker->numberBetween($min = 1, $max = 999),
            'PSAgrade' => $this->faker->randomElement(['1', '2', '3', '4', '5', '6', '7', '8', '9', '10']),
            'image' => 'pokemon_card_backside.png',
            'launchDate' => $this->faker->date(),
            'rarity' => $this->faker->randomElement([
                'Amazing Rare',
                'Common',
                'LEGEND',
                'Promo',
                'Rare',
                'Rare ACE',
                'Rare BREAK',
                'Rare Holo',
                'Rare Holo EX',
                'Rare Holo GX',
                'Rare Holo LV.X',
                'Rare Holo Star',
                'Rare Holo V',
                'Rare Holo VMAX',
                'Rare Prime',
                'Rare Prism Star',
                'Rare Rainbow',
                'Rare Secret',
                'Rare Shining',
                'Rare Shiny',
                'Rare Shiny GX',
                'Rare Ultra',
                'Uncommon',
            ]),
            'pullRate' => $this->faker->randomFloat(2, 0, 1),
            'language' => $this->faker->randomElement(['english', 'spanish', 'french', 'german']),
            'stock' => $this->faker->randomNumber(),
        ];
    }
}
