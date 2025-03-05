<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\TCGCard;
use App\Models\TCGPack;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $cards = TCGCard::factory()
            ->count(50)
            ->create();
        $pack = TCGPack::factory()
            ->count(1)
            ->create();

        Order::factory(10)->create();

        foreach ($cards as $card) {
            $card->tcgPacks()->attach($pack->pluck('id'));
        }
    }
}
