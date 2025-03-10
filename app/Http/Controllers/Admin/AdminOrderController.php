<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Contracts\View\View;

class AdminOrderController extends Controller
{
    public function index(): View
    {
        $orders = Order::paginate(10);
        $viewData = [
            'subtitle1' => 'Orders',
            'orders' => $orders,
        ];

        return view('admin.order.index')->with('viewData', $viewData);
    }
}
