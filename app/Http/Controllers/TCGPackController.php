<?php

namespace App\Http\Controllers;

use App\Models\TCGPack;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TCGPackController extends Controller
{
    /**
     * Get all TCGPacks
     */
    public function index(Request $request): View
    {

        $tcgPacks = TCGPack::filterAndSort($request)->paginate(16);
        $viewData = [
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
            'tcgPack' => $tcgPack,
        ];

        return view('tcgPack.show')->with('viewData', $viewData);
    }
}
