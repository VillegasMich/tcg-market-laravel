<?php

namespace App\Http\Controllers;

use App\Models\TCGCard;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class CartController extends Controller
{
    public function index(Request $request): View
    {
        $cartProducts = [];
        $cartProductData = $request->session()->get('cart_product_data');
        if (! empty($cartProductData)) {
            $productIds = array_keys($cartProductData);
            $cartProducts = TCGCard::whereIn('id', $productIds)->get();
            foreach ($cartProducts as $card) {
                $card->quantity = $cartProductData[$card->id];
            }
        }
        $total = 0;
        foreach ($cartProducts as $tcgCard) {
            $subtotal = $tcgCard->quantity * $tcgCard->getPrice();
            $total += $subtotal;
        }
        $viewData = [
            'title' => 'Your Cart',
            'cartProducts' => $cartProducts,
            'total' => $total,
        ];

        return view('cart.index')->with('viewData', $viewData);
    }

    public function removeAll(Request $request): RedirectResponse
    {
        $request->session()->forget('cart_product_data');

        return back();
    }
}
