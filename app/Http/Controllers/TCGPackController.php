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
        $tcgPacks = TCGPack::all();
        $viewData = [
            'title' => 'TCGPacks - Market',
            'subtitle' => 'List of packs',
            'tcgPacks' => $tcgPacks,
        ];

        return view('tcgPack.index')->with('viewData', $viewData);
    }

    /**
     * Get a TCGPack by id
     */
    public function show(string $id): View|RedirectResponse
    {
        $tcgPack = TCGPack::findOrFail($id);
        $viewData = [
            'title' => $tcgPack['name'].' - Market',
            'subtitle' => $tcgPack['name'].' - Pack information',
            'tcgPack' => $tcgPack,
        ];

        return view('tcgPack.show')->with('viewData', $viewData);
    }

    /**
     * Delete a TCGPack by id
     */
    public function delete(string $id): RedirectResponse
    {
        $tcgPack = TCGPack::destroy($id);

        return redirect()->route('tcgPack.index');
    }

    /**
     * Create view
     */
    public function create(): View
    {
        $viewData = [];
        $viewData['title'] = 'Create a new pack';

        return view('tcgPack.create')->with('viewData', $viewData);
    }

    /**
     * Update view
     */
    public function update(string $id): View
    {
        $tcgPack = TCGPack::findOrFail($id);
        $viewData = [
            'title' => 'Update a pack',
            'tcgPack' => $tcgPack,
        ];

        return view('tcgPack.update')->with('viewData', $viewData);
    }

    /**
     * Save a new created TCGPack
     */
    public function saveCreate(Request $request): View
    {
        $viewData = [
            'title' => 'Successful Creation',
        ];
        $request->validate(TCGPackValidator::$rules);
        TCGPack::create($request->only(['name', 'image']));

        return view('tcgPack.success')->with('viewData', $viewData);
    }

    /**
     * Save an updated TCGCard
     */
    public function saveUpdate(Request $request, string $id): View
    {
        $viewData = [
            'title' => 'Successful Update',
        ];
        $request->validate(TCGPackValidator::$rules);
        $tcgCard = TCGPack::findOrFail($id);
        $tcgCard->update($request->only(['name', 'image']));

        return view('tcgPack.success')->with('viewData', $viewData);
    }
}
