<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Validators\ItemValidator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ItemController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = 'Items - TCG Market';
        $viewData['subtitle'] = 'List of Items';
        $viewData['items'] = Item::all();

        return view('item.index')->with('viewData', $viewData);
    }

    public function show(string $id): View
    {
        $viewData = [];
        $item = Item::findOrFail($id);
        $viewData['item'] = $item;

        return view('item.show')->with('viewData', $viewData);
    }

    public function create(): View
    {
        $viewData = [];
        $viewData['title'] = 'Create item';

        return view('item.create')->with('viewData', $viewData);
    }

    public function save(Request $request): RedirectResponse
    {
        $request->validate(ItemValidator::$rules);
        Item::create($request->only(['quantity', 'subtotal']));

        return back()->with('success', 'Elemento creado satisfactoriamente');
    }

    public function delete(string $id): RedirectResponse
    {
        $item = Item::findOrFail($id);
        $item->delete();

        return redirect()->route('item.index')->with('success', 'Elemento eliminado satisfactoriamente');
    }
}
