<?php

namespace App\Http\Controllers;

use App\Models\TCGCard;
use App\Validators\TCGCardValidator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TCGCardController extends Controller
{
    /**
     * Get all TCGCards
     */
    public function index(): View
    {
        $tcgCards = TCGCard::all();
        $viewData = [
            'title' => 'TCGCards - Market',
            'subtitle' => 'List of cards',
            'tcgCards' => $tcgCards,
        ];

        return view('tcgCard.index')->with('viewData', $viewData);
    }

    /**
     * Get a TCGCard by id
     */
    public function show(string $id): View|RedirectResponse
    {
        $tcgCard = TCGCard::with('tcgPacks')->findOrFail($id);
        $viewData = [
            'tcgCard' => $tcgCard,
        ];

        return view('tcgCard.show')->with('viewData', $viewData);
    }

    /**
     * Delete a TCGCard by id
     */
    public function delete(string $id): RedirectResponse
    {
        $tcgCard = TCGCard::destroy($id);

        return redirect()->route('tcgCard.index');
    }

    /**
     * Create view
     */
    public function create(): View
    {
        $viewData = [
            'title' => 'Create a new card',
        ];

        return view('tcgCard.create')->with('viewData', $viewData);
    }

    /**
     * Update view
     */
    public function update(string $id): View
    {
        $tcgCard = TCGCard::findOrFail($id);
        $viewData = [
            'title' => 'Update a card',
            'tcgCard' => $tcgCard,
        ];

        return view('tcgCard.update')->with('viewData', $viewData);
    }

    /**
     * Save a new created TCGCard
     */
    public function saveCreate(Request $request): View
    {
        $viewData = [
            'title' => 'Successful Creation',
        ];
        $request->validate(TCGCardValidator::$rules);
        TCGCard::create($request->only(['name', 'description', 'franchise', 'collection', 'price', 'PSAgrade', 'image', 'launchDate', 'rarity', 'pullRate', 'language', 'stock']));

        return view('tcgCard.success')->with('viewData', $viewData);
    }

    /**
     * Save an updated TCGCard
     */
    public function saveUpdate(Request $request, string $id): View
    {
        $viewData = [
            'title' => 'Successful Update',
        ];
        $request->validate(TCGCardValidator::$rules);
        $tcgCard = TCGCard::findOrFail($id);
        $tcgCard->update($request->only(['name', 'description', 'franchise', 'collection', 'price', 'PSAgrade', 'image', 'launchDate', 'rarity', 'pullRate', 'language', 'stock']));

        return view('tcgCard.success')->with('viewData', $viewData);
    }
}
