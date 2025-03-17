<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\Order;
use App\Models\TCGCard;
use App\Models\TCGPack;
use App\Models\User;
use App\Models\WishList;
use Illuminate\Contracts\View\View;

class AdminHomeController extends Controller
{
    public function index(): View
    {
        return view('admin.index', [
            'viewData' => [
                'tcgCards' => TCGCard::limit(7)->get(),
                'totalTcgCards' => TCGCard::count(),
                'tcgPacks' => TCGPack::limit(9)->get(),
                'totalTcgPacks' => TCGPack::count(),
                'items' => Item::limit(5)->get(),
                'totalItems' => Item::count(),
                'orders' => Order::limit(4)->get(),
                'totalOrders' => Order::count(),
                'totalWishLists' => WishList::count(),
                'totalUsers' => User::count(),
            ],
        ]);
    }
}
