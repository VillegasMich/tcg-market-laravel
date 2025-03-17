<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\ImageStorage;
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
        $tcgPack = TCGPack::findOrFail($id);
        $tcgPack->setTcgCards([]);
        $tcgPack->delete();

        return redirect()->route('admin.tcgPack.index');
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
    public function saveCreate(Request $request): RedirectResponse
    {
        $validatedData = $request->validate(TCGPackValidator::$rules);
        $newTcgPack = TCGPack::create($request->only(['name', 'franchise']));
        if ($request->hasFile('image')) {
            $storeInterface = app(ImageStorage::class);
            $imageName = $storeInterface->store($newTcgPack->getId(), $request);
            $newTcgPack->setImage($imageName);
            $newTcgPack->save();
        }

        return back()->with('success', 'Successful Creation');
    }

    /**
     * Save an updated TCGCard
     */
    public function saveUpdate(Request $request, string $id): RedirectResponse
    {
        $request->validate(TCGPackValidator::$rules);
        $tcgPack = TCGPack::findOrFail($id);
        $tcgPack->update($request->only(['name', 'franchise']));
        if ($request->hasFile('image')) {
            $storeInterface = app(ImageStorage::class);
            $imageName = $storeInterface->store($tcgPack->getId(), $request);
            $tcgPack->setImage($imageName);
            $tcgPack->save();
        }

        return back()->with('success', 'Successful Update');
    }
}
