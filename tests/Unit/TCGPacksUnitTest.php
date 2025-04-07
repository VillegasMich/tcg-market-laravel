<?php

namespace Tests\Unit;

use App\Models\TCGPack;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use Tests\TestCase;

class TCGPacksUnitTest extends TestCase
{
    use RefreshDatabase;

    public function test_set_and_get_name(): void
    {
        $name = 'Sun and Moon';

        $tcgPack = new TCGPack;
        $tcgPack->setName($name);

        $this->assertEquals($name, $tcgPack->getName());
    }

    public function test_set_default_image_if_not_given(): void
    {
        $defaultImage = 'pokemon_tcg_pack_default.png';
        $tcgPack = TCGPack::factory()->create([]);

        $tcgPack->refresh();

        $this->assertEquals($defaultImage, $tcgPack->getImage());
    }

    public function test_it_filters_by_keyword(): void
    {
        TCGPack::factory()->create(['name' => 'Sun and Moon']);
        TCGPack::factory()->create(['name' => 'Sword and Shield']);

        $request = Request::create('/tcgpacks', 'GET', ['keyword' => 'Su']);

        $results = TCGPack::filterAndSort($request)->get();

        $this->assertCount(1, $results);
        $this->assertEquals('Sun and Moon', $results->first()->name);
    }

    public function test_it_returns_unsorted_results_when_no_sort_given(): void
    {
        TCGPack::factory()->create(['name' => 'Pack A']);
        TCGPack::factory()->create(['name' => 'pack B']);

        $request = Request::create('/tcgpacks', 'GET');

        $results = TCGPack::filterAndSort($request)->get();

        $this->assertCount(2, $results);
    }
}
