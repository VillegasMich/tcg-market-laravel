<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WishList;
use Illuminate\Contracts\View\View;

class AdminWishListController extends Controller
{
    public function index(): View
    {
        $wishLists = WishList::paginate(10);
        $viewData = [
            'subtitle1' => 'Wish Lists',
            'wishLists' => $wishLists,
        ];

        return view('admin.wishList.index')->with('viewData', $viewData);
    }
}
