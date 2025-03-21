<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Models\Order;
use App\Models\TCGCard;
use App\Models\TCGPack;
use App\Models\User;
use App\Models\WishList;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(3)->create();

        $pack = TCGPack::factory()
            ->count(1)
            ->create();

        $cards = TCGCard::all();

        // Order::factory(10)->create();
        // Item::factory(20)->create();
        // WishList::factory(10)->create();
        foreach ($cards as $card) {
            $card->tcgPacks()->attach($pack->pluck('id'));
        }
    }
}
