<?php

// Author: Miguel Vasquez Bojanini.

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Order;
use App\Models\TCGCard;
use App\Validators\OrderValidator;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Get all orders.
     */
    public function index(): View|RedirectResponse
    {

        $user = Auth::user();

        if (! $user) {
            return redirect()->route('login');
        }

        $orders = Order::withCount('items')->where('user_id', $user->getId())->get();
        $viewData = [
            'title' => 'Orders',
            'orders' => $orders,
        ];

        return view('order.index')->with('viewData', $viewData);
    }

    /**
     * Create view.
     */
    public function create(): View
    {
        $viewData = [
            'title' => 'Create',
        ];

        return view('order.create')->with('viewData', $viewData);
    }

    /**
     * Create an Order.
     */
    public function saveCreate(Request $request): RedirectResponse
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

        $items = [];
        $total = 0;
        foreach ($cartProducts as $tcgCard) {
            $subtotal = $tcgCard->quantity * $tcgCard->getPrice();
            $total += $subtotal;

            $item = Item::create(['quantity' => $tcgCard->quantity, 'subtotal' => $subtotal]);
            $item->setTCGCard($tcgCard);
            $items[] = $item;
        }

        $user = Auth::user();
        $order = Order::create(['total' => $total, 'paymentMethod' => 'card']);
        $order->setUser($user);

        foreach ($items as $item) {
            $item->setOrder($order);
        }

        return redirect()->route('order.index');
    }

    /**
     * Show a specific Order.
     */
    public function show(int $id): View
    {
        $order = Order::findOrFail($id);

        $viewData = [
            'order' => $order,
            'title' => 'Order',
        ];

        return view('order.show')->with('viewData', $viewData);
    }

    /**
     * Delete a specific Order.
     */
    public function delete(int $id): RedirectResponse
    {
        Order::destroy($id);

        return redirect()->route('user.index');
    }

    /**
     * Update view.
     */
    public function update(int $id): View
    {
        $order = Order::findOrFail($id);

        $viewData = [
            'order' => $order,
            'title' => 'Update order',
        ];

        return view('order.update')->with('viewData', $viewData);
    }

    /**
     * Update a specific Order.
     */
    public function saveUpdate(Request $request, int $id): View
    {
        $request->validate(OrderValidator::$rules);
        $order = Order::findOrFail($id);
        $order->update($request->only(['total', 'status', 'paymentMethod']));

        $viewData = [
            'title' => 'Successful update',
        ];

        return view('order.success')->with('viewData', $viewData);
    }
}
