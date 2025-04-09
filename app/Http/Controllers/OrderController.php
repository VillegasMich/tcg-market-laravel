<?php

// Author: Miguel Vasquez Bojanini.

namespace App\Http\Controllers;

use App\Interfaces\PDFGenerator;
use App\Models\Item;
use App\Models\Order;
use App\Models\TCGCard;
use App\Validators\OrderValidator;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Get all orders.
     */
    public function index(): View|RedirectResponse
    {
        $user = Auth::user();
        $orders = Order::with(['items.TCGCard'])->where('user_id', $user->getId())->get();
        $viewData = [
            'orders' => $orders,
        ];

        return view('order.index')->with('viewData', $viewData);
    }

    /**
     * Create an Order.
     */
    public function saveCreate(Request $request): RedirectResponse
    {
        $user = Auth::user();

        $cartProducts = [];
        $cartProductData = $request->session()->get('cart_product_data');
        if (! empty($cartProductData)) {
            $productIds = array_keys($cartProductData);
            $cartProducts = TCGCard::whereIn('id', $productIds)->get();
            foreach ($cartProducts as $card) {
                $card->quantity = $cartProductData[$card->getId()];
            }
        }

        foreach ($cartProducts as $tcgCard) {
            if ($tcgCard->getStock() < $tcgCard->quantity) {
                return back()->with('error', 'Not enough stock');
            }
        }

        $items = [];
        $total = 0;
        foreach ($cartProducts as $tcgCard) {
            $subtotal = $tcgCard->quantity * $tcgCard->getPrice();
            $total += $subtotal;

            $newStock = $tcgCard->getStock() - $tcgCard->quantity;

            $item = Item::create(['quantity' => $tcgCard->quantity, 'subtotal' => $subtotal]);

            unset($tcgCard->quantity);
            $tcgCard->setStock($newStock);
            $tcgCard->save();

            $item->setTCGCard($tcgCard);
            $items[] = $item;
        }

        $order = Order::create(['total' => $total, 'paymentMethod' => 'card']);
        $order->setUser($user);
        $order->save();

        foreach ($items as $item) {
            $item->setOrder($order);
            $item->save();
        }

        $request->session()->forget('cart_product_data');

        return redirect()->route('order.index');
    }

    /**
     * Show a specific Order.
     */
    public function show(int $id): View
    {
        $order = Order::with(['items.TCGCard'])->where('id', $id)->first();

        $viewData = [
            'order' => $order,
        ];

        return view('order.show')->with('viewData', $viewData);
    }

    /**
     * Delete a specific Order.
     */
    public function delete(int $id): RedirectResponse
    {
        $order = Order::with(['items.TCGCard'])->where('id', $id)->first();

        foreach ($order->getItems() as $item) {
            $qtToAdd = $item->getQuantity();
            $tcgCard = $item->getTCGCard();
            $tcgCard->setStock($tcgCard->getStock() + $qtToAdd);
            $tcgCard->save();
        }

        $order->items()->delete();
        $order->delete();

        return redirect()->route('order.index');
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

    public function pay(int $string): Response | RedirectResponse
    {
        $user = Auth::user();
        $order = Order::with(['items.tcgCard'])->findOrFail($string);
        $user->setBalance($user->getBalance() - $order->getTotal());
        if ($user->getBalance() < 0) {
            return back()->with('error', 'Not enough balance');
        }
        $order->setStatus('shipped');
        $order->save();
        $user->save();

        $PDFGeneratorInterface = app('invoice.pdf');
        $PDFGeneratorReceiptInterface = app('receipt.pdf');

        $data = [
            'order' => $order,
        ];

        $PDFGeneratorReceiptInterface->generate('order.invoice', $data, 'receipt.pdf');

        return $PDFGeneratorInterface->generate('order.invoice',$data,'invoice.pdf');
        // redirect()->route('home.index')->with('success', 'Payment successful'); Check how to do the redirect!!!!
    }
}
