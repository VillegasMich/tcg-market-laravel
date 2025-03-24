<?php

namespace App\Http\Controllers;

use App\Models\TCGCard;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
            'tcgCards' => $tcgCards,
        ];

        return view('tcgCard.index')->with('viewData', $viewData);
    }

    /**
     * Get a TCGCard by id
     */
    public function show(string $id): View|RedirectResponse
    {
        $tcgCard = TCGCard::with('tcgPacks', 'wishList')->findOrFail($id);
        $user = Auth::user();
        $isInWishList = false;
        foreach ($tcgCard->getWishList() as $wishList) {
            if ($wishList->getUser()->getId() == $user->getId()) {
                $isInWishList = true;
            }
        }
        $viewData = [
            'tcgCard' => $tcgCard,
            'isInWishList' => $isInWishList,
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
            if ($cartProductData[$tcgCard->getId()] >= $tcgCard->getStock()) {
                return back()->with('error', "{$tcgCard->getName()} is out of stock!");
            } else {
                $cartProductData[$tcgCard->getId()] += 1;
            }
        } else {
            $cartProductData[$tcgCard->getId()] = 1;
        }
        $request->session()->put('cart_product_data', $cartProductData);

        return back()->with('success', "{$tcgCard->getName()} has been added to your cart!");
    }

    /**
     * Add a TCGCard to the wish list
     */
    public function addToWishList(string $id): RedirectResponse
    {
        $user = Auth::user();
        $tcgCard = TCGCard::findOrFail($id);
        $userWishList = $user->getWishlist();
        $userWishList->tcgCards()->syncWithoutDetaching([$tcgCard->id]);

        return back()->with('success', "{$tcgCard->getName()} has been added to your wish list!");
    }

    /**
     * Remove a TCGCard from the wish list
     */
    public function removeFromWishList(string $id): RedirectResponse
    {
        $user = Auth::user();
        $tcgCard = TCGCard::findOrFail($id);
        $userWishList = $user->getWishlist();
        $userWishList->tcgCards()->detach($tcgCard->id);

        return back()->with('success', "{$tcgCard->getName()} has been removed from your wish list!");
    }
}
