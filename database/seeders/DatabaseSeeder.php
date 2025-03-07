<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Models\Order;
use App\Models\TCGCard;
use App\Models\TCGPack;
use App\Models\WishList;
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
        $packs = TCGPack::factory()
            ->count(5)
            ->create();

        Order::factory(10)->create();
        Item::factory(20)->create();
        WishList::factory(10)->create();
        foreach ($cards as $card) {
            $card->tcgPacks()->attach($packs->random(3)->pluck('id'));
        }
    }
}
