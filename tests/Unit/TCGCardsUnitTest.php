<?php

namespace Tests\Unit;

use App\Models\TCGCard;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use Tests\TestCase;

class TCGCardsUnitTest extends TestCase
{
    use RefreshDatabase;

    public function test_set_and_get_name(): void
    {
        $name = 'Charizar Ex';

        $tcgCard = new TCGCard();
        $tcgCard->setName($name);

        $this->assertEquals($name, $tcgCard->getName());
    }

    public function test_set_default_image_if_not_given(): void
    {
        $defaultImage = 'pokemon_card_backside.png';
        $tcgCard = TCGCard::factory()->create([]);

        $tcgCard->refresh();

        $this->assertEquals($defaultImage, $tcgCard->getImage());
    }

    public function test_it_filters_by_keyword(): void
    {
        TCGCard::factory()->create(['name' => 'Charizard']);
        TCGCard::factory()->create(['name' => 'Bulbasaur']);

        $request = Request::create('/tcgcards', 'GET', ['keyword' => 'char']);

        $results = TCGCard::filterAndSort($request)->get();

        $this->assertCount(1, $results);
        $this->assertEquals('Charizard', $results->first()->name);
    }

    public function test_it_sorts_by_price_ascending(): void
    {
        TCGCard::factory()->create(['name' => 'Card A', 'price' => 10]);
        TCGCard::factory()->create(['name' => 'Card B', 'price' => 5]);

        $request = Request::create('/tcgcards', 'GET', ['sort' => 'price_asc']);

        $results = TCGCard::filterAndSort($request)->get();

        $this->assertEquals(['Card B', 'Card A'], $results->pluck('name')->toArray());
    }

    public function test_it_sorts_by_psa_desc(): void
    {
        TCGCard::factory()->create(['name' => 'Card A', 'PSAgrade' => 'undefined']);
        TCGCard::factory()->create(['name' => 'Card B', 'PSAgrade' => '10']);
        TCGCard::factory()->create(['name' => 'Card C', 'PSAgrade' => '7']);

        $request = Request::create('/tcgcards', 'GET', ['sort' => 'psa_desc']);

        $results = TCGCard::filterAndSort($request)->get();

        $this->assertEquals(['Card B', 'Card C', 'Card A'], $results->pluck('name')->toArray());
    }

    public function test_it_returns_unsorted_results_when_no_sort_given(): void
    {
        TCGCard::factory()->create(['name' => 'Card A']);
        TCGCard::factory()->create(['name' => 'Card B']);

        $request = Request::create('/tcgcards', 'GET');

        $results = TCGCard::filterAndSort($request)->get();

        $this->assertCount(2, $results);
    }
}
