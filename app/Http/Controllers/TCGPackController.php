<?php

namespace App\Http\Controllers;

use App\Models\TCGPack;
use App\Validators\TCGPackValidator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TCGPackController extends Controller
{
    /**
     * Get all TCGPacks
     */
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = 'TCGCards - Market';
        $viewData['subtitle'] = 'List of packs';
        $viewData['tcgPacks'] = TCGPack::all();

        return view('tcgPacks.index')->with('viewData', $viewData);
    }

    /**
     * Get a TCGPack by id
     */
    public function show(string $id): View|RedirectResponse
    {
        $viewData = [];
        $tcgPack = TCGPack::findOrFail($id);
        $viewData['title'] = $tcgPack['name'].' - Market';
        $viewData['subtitle'] = $tcgPack['name'].' - Pack information';
        $viewData['tcgCard'] = $tcgPack;

        return view('tcgCards.show')->with('viewData', $viewData);
    }

    /**
     * Delete a TCGPack by id
     */
    public function delete(string $id): RedirectResponse
    {
        $tcgPack = TCGPack::destroy($id);

        return redirect()->route('tcgCards.index');
    }

    /**
     * Create view
     */
    public function create(): View
    {
        $viewData = [];
        $viewData['title'] = 'Create a new pack';

        return view('tcgPacks.create')->with('viewData', $viewData);
    }

    /**
     * Update view
     */
    public function update(string $id): View
    {
        $viewData = [];
        $viewData['title'] = 'Update a pack';
        $viewData['tcgPack'] = TCGPack::findOrFail($id);

        return view('tcgPack.update')->with('viewData', $viewData);
    }

    /**
     * Save a new created TCGPack
     */
    public function saveCreate(Request $request): View
    {
        $viewData = [];
        $viewData['title'] = 'Successful Creation';

        $request->validate(TCGPackValidator::$rules);
        TCGPack::create($request->only(['name', 'image']));

        return view('tcgPacks.success')->with('viewData', $viewData);
    }

    /**
     * Save an updated TCGCard
     */
    public function saveUpdate(Request $request, string $id): View
    {
        $viewData = [];
        $viewData['title'] = 'Successful Update';
        $request->validate(TCGPackValidator::$rules);
        $tcgCard = TCGPack::findOrFail($id);
        $tcgCard->update($request->only(['name', 'image']));

        return view('tcgPack.success')->with('viewData', $viewData);
    }
}
