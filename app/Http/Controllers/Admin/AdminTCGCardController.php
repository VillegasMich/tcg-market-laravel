<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\ImageStorage;
use App\Models\TCGCard;
use App\Models\TCGPack;
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
        $tcgCard = TCGCard::findOrFail($id);
        foreach ($tcgCard->getTcgPacks() as $pack) {
            $pack->tcgCards()->detach($id);
        }
        $tcgCard->delete();

        return redirect()->route('admin.tcgCard.index');
    }

    /**
     * Create view
     */
    public function create(): View
    {
        $collections = TCGPack::all();
        $viewData = [
            'subtitle1' => 'Create a new card',
            'collections' => $collections,
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
    public function saveCreate(Request $request): RedirectResponse
    {
        $validatedData = $request->validate(TCGCardValidator::$rules);
        $newTcgCard = TCGCard::create($request->only(['name', 'description', 'franchise',  'price', 'PSAgrade', 'launchDate', 'rarity', 'pullRate', 'language', 'stock']));
        $newTcgCard->setTcgPacks(TCGPack::findOrFail($request->get('collection')));

        if ($request->hasFile('image')) {
            $storeInterface = app(ImageStorage::class);
            $imageName = $storeInterface->store($newTcgCard->getId(), $request);
            $newTcgCard->setImage($imageName);
            $newTcgCard->save();
        }

        return back()->with('success', 'Successful Creation');
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
        $tcgCard->update($request->only(['name', 'description', 'franchise', 'collection', 'price', 'PSAgrade', 'launchDate', 'rarity', 'pullRate', 'language', 'stock']));

        if ($request->hasFile('image')) {
            $storeInterface = app(ImageStorage::class);
            $imageName = $storeInterface->store($id, $request);
            $tcgCard->setImage($imageName);
            $tcgCard->save();
        }


        return view('admin.tcgCard.success')->with('viewData', $viewData);
    }
}
