<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use App\Validators\OrderValidator;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    /**
     * Render create view.
     */
    public function create(): View
    {
        $viewData = [
            'title' => 'Create',
        ];

        return view('order.create')->with('viewData', $viewData);
    }

    /**
     * Create a Order.
     */
    public function saveCreate(Request $request): View
    {
        $request->validate(OrderValidator::$rules);

        $viewData = [
            'title' => 'Successful creation',
        ];

        Order::create($request->only(['total', 'paymentMethod']));

        return view('order.success')->with('viewData', $viewData);
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

        return redirect()->route('order.list');
    }
    
    /**
     * Render Update view.
     */
    public function update(int $id): View
    {
        $order = Order::findOrFail($id);

        $viewData = [
            'order' => $order,
            'title' => 'Order',
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
