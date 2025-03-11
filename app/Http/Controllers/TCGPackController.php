<?php

namespace App\Http\Controllers;

use App\Models\TCGPack;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class TCGPackController extends Controller
{
    /**
     * Get all TCGPacks
     */
    public function index(): View
    {
        $tcgPacks = TCGPack::paginate(8);
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
}
