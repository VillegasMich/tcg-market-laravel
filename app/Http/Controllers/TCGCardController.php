<?php

namespace App\Http\Controllers;

use App\Models\TCGCard;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TCGCardController extends Controller
{
    /**
     * Get all TCGCards
     */
    public function index(Request $request): View
    {
        if ($request->query('keyword')) {
            $tcgCards = TCGCard::where('name', 'LIKE', '%' . $request->query('keyword') . '%')->paginate(16);
        } else {
            $tcgCards = TCGCard::paginate(16);
        }
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
}
