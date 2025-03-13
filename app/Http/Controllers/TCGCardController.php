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
        $tcgCards = TCGCard::filterAndSort($request)->paginate(16);
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

    /**
     * Add a TCGCard to the cart
     */
    public function addToCart(string $id, Request $request): RedirectResponse
    {
        $cartProductData = $request->session()->get('cart_product_data');
        $tcgCard = TCGCard::findOrFail($id);
        if (isset($cartProductData[$tcgCard->getId()])) {
            $cartProductData[$tcgCard->getId()] += 1;
        } else {
            $cartProductData[$tcgCard->getId()] = 1;
        }
        $request->session()->put('cart_product_data', $cartProductData);

        return back()->with('success', "{$tcgCard->getName()} has been added to your cart!");
    }
}
