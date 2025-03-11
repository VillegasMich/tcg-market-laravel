<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Contracts\View\View;

class AdminItemController extends Controller
{
    public function index(): View
    {
        $items = Item::paginate(10);
        $viewData = [
            'subtitle1' => 'Items',
            'items' => $items,
        ];

        return view('admin.item.index')->with('viewData', $viewData);
    }
}
