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
        $viewData = [];
        $viewData['title'] = 'TCGCards - Market';
        $viewData['subtitle'] = 'List of cards';
        $viewData['tcgCards'] = TCGCard::all();

        return view('tcgCards.index')->with('viewData', $viewData);
    }

    /**
     * Get a TCGCard by id
     */
    public function show(string $id): View|RedirectResponse
    {
        $viewData = [];
        $tcgCard = TCGCard::findOrFail($id);
        $viewData['title'] = $tcgCard['name'].' - Market';
        $viewData['subtitle'] = $tcgCard['name'].' - Card information';
        $viewData['tcgCard'] = $tcgCard;

        return view('tcgCards.show')->with('viewData', $viewData);
    }

    /**
     * Delete a TCGCard by id
     */
    public function delete(string $id): RedirectResponse
    {
        $tcgCard = TCGCard::destroy($id);

        return redirect()->route('tcgCards.index');
    }

    /**
     * Create view
     */
    public function create(): View
    {
        $viewData = [];
        $viewData['title'] = 'Create a new card';

        return view('tcgCards.create')->with('viewData', $viewData);
    }

    /**
     * Update view
     */
    public function update(string $id): View
    {
        $viewData = [];
        $viewData['title'] = 'Update a card';
        $viewData['tcgCard'] = TCGCard::findOrFail($id);

        return view('tcgCards.update')->with('viewData', $viewData);
    }

    /**
     * Save a new created TCGCard
     */
    public function saveCreate(Request $request): View
    {
        $viewData = [];
        $viewData['title'] = 'Successful Creation';

        $request->validate(TCGCardValidator::$rules);
        TCGCard::create($request->only(['name', 'description', 'franchise', 'collection', 'price', 'PSAgrade', 'image', 'launchDate', 'rarity', 'pullRate', 'language', 'stock']));

        return view('tcgCards.success')->with('viewData', $viewData);
    }

    /**
     * Save an updated TCGCard
     */
    public function saveUpdate(Request $request, string $id): View
    {
        $viewData = [];
        $viewData['title'] = 'Successful Update';
        $request->validate(TCGCardValidator::$rules);
        $tcgCard = TCGCard::findOrFail($id);
        $tcgCard->update($request->only(['name', 'description', 'franchise', 'collection', 'price', 'PSAgrade', 'image', 'launchDate', 'rarity', 'pullRate', 'language', 'stock']));

        return view('tcgCards.success')->with('viewData', $viewData);
    }
}
