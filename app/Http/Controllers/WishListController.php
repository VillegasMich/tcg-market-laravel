<?php

namespace App\Http\Controllers;

use App\Models\WishList;
use App\Validators\WishListValidator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class WishListController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = 'WishList - TCG Market';
        $viewData['subtitle'] = 'WishList';
        $viewData['wishLists'] = WishList::all();

        return view('wishList.index')->with('viewData', $viewData);
    }

    public function show(string $id): View
    {
        $viewData = [];
        $wishList = WishList::findOrFail($id);
        $viewData['wishList'] = $wishList;

        return view('wishList.show')->with('viewData', $viewData);
    }

    public function create(): View
    {
        $viewData = [];
        $viewData['title'] = 'Create WishList';

        return view('wishList.create')->with('viewData', $viewData);
    }

    public function save(Request $request): RedirectResponse
    {
        $request->validate(WishListValidator::$creationRules);
        WishList::create($request->only(['name']));

        return back()->with('success', 'Elemento creado satisfactoriamente');
    }

    public function delete(string $id): RedirectResponse
    {
        $wishList = WishList::findOrFail($id);
        $wishList->delete();

        return redirect()->route('wishList.index')->with('success', 'Elemento eliminado satisfactoriamente');
    }
}
