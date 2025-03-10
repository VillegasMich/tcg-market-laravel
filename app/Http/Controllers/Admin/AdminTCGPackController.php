<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TCGPack;
use App\Validators\TCGPackValidator;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AdminTCGPackController extends Controller
{
    /**
     * Get all TCGPacks
     */
    public function index(): View
    {
        $tcgPacks = TCGPack::paginate(10);
        $viewData = [
            'subtitle1' => 'TCG Packs',
            'tcgPacks' => $tcgPacks,
        ];

        return view('admin.tcgPack.index')->with('viewData', $viewData);
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
        $viewData = [
            'subtitle1' => 'Create a new pack',
        ];

        return view('admin.tcgPack.create')->with('viewData', $viewData);
    }

    /**
     * Update view
     */
    public function update(string $id): View
    {
        $tcgPack = TCGPack::findOrFail($id);
        $viewData = [
            'subtitle1' => 'Update a pack',
            'tcgPack' => $tcgPack,
        ];

        return view('admin.tcgPack.update')->with('viewData', $viewData);
    }

    /**
     * Save a new created TCGPack
     */
    public function saveCreate(Request $request): View
    {
        $viewData = [
            'subtitle1' => 'Successful Creation',
        ];
        $request->validate(TCGPackValidator::$rules);
        TCGPack::create($request->only(['name', 'image']));

        return view('admin.tcgPack.success')->with('viewData', $viewData);
    }

    /**
     * Save an updated TCGCard
     */
    public function saveUpdate(Request $request, string $id): View
    {
        $viewData = [
            'subtitle1' => 'Successful Update',
        ];
        $request->validate(TCGPackValidator::$rules);
        $tcgCard = TCGPack::findOrFail($id);
        $tcgCard->update($request->only(['name', 'image']));

        return view('admin.tcgPack.success')->with('viewData', $viewData);
    }
}
