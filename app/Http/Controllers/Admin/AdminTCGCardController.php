<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TCGCard;
use App\Validators\TCGCardValidator;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AdminTCGCardController extends Controller
{
    /**
     * Get all TCGCards
     */
    public function index(): View
    {
        $tcgCards = TCGCard::paginate(10);
        $viewData = [
            'subtitle1' => 'TCG Cards',
            'tcgCards' => $tcgCards,
        ];

        return view('admin.tcgCard.index')->with('viewData', $viewData);
    }

    /**
     * Delete a TCGCard by id
     */
    public function delete(string $id): RedirectResponse
    {
        $tcgCard = TCGCard::destroy($id);

        return redirect()->route('admin.tcgCard.index');
    }

    /**
     * Create view
     */
    public function create(): View
    {
        $viewData = [
            'subtitle1' => 'Create a new card',
        ];

        return view('admin.tcgCard.create')->with('viewData', $viewData);
    }

    /**
     * Update view
     */
    public function update(string $id): View
    {
        $tcgCard = TCGCard::findOrFail($id);
        $viewData = [
            'subtitle1' => 'Update a card',
            'tcgCard' => $tcgCard,
        ];

        return view('admin.tcgCard.update')->with('viewData', $viewData);
    }

    /**
     * Save a new created TCGCard
     */
    public function saveCreate(Request $request): View
    {
        $viewData = [
            'subtitle1' => 'Successful Creation',
        ];
        $request->validate(TCGCardValidator::$rules);
        TCGCard::create($request->only(['name', 'description', 'franchise', 'collection', 'price', 'PSAgrade', 'image', 'launchDate', 'rarity', 'pullRate', 'language', 'stock']));

        return view('admin.tcgCard.success')->with('viewData', $viewData);
    }

    /**
     * Save an updated TCGCard
     */
    public function saveUpdate(Request $request, string $id): View
    {
        $viewData = [
            'subtitle1' => 'Successful Update',
        ];
        $request->validate(TCGCardValidator::$rules);
        $tcgCard = TCGCard::findOrFail($id);
        $tcgCard->update($request->only(['name', 'description', 'franchise', 'collection', 'price', 'PSAgrade', 'image', 'launchDate', 'rarity', 'pullRate', 'language', 'stock']));

        return view('admin.tcgCard.success')->with('viewData', $viewData);
    }
}
