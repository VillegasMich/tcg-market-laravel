<?php

namespace Database\Seeders;

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
        TCGCard::factory()
            ->count(50)
            ->create();
        TCGPack::factory()
            ->count(5)
            ->create();
    }
}
