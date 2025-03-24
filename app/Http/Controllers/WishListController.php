<?php

namespace App\Http\Controllers;

use App\Models\WishList;
use App\Validators\WishListValidator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class WishListController extends Controller
{
    public function index(): View
    {
        $user = Auth::user();

        $viewData = [
            'wishList' =>  WishList::with('TCGCards')->where('user_id', $user->getId())->first()
        ];

        return view('wishlist.index')->with('viewData', $viewData);
    }

}
