<?php

namespace Database\Seeders;

use App\Models\TCGCard;
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
    }
}
