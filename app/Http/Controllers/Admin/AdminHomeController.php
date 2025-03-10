<?php

namespace App\Http\Controllers\Admin;

use App\Models\TCGCard;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class AdminHomeController extends Controller
{
    public function index(): View
    {
        $tcgCards = TCGCard::paginate(10);
        $viewData = [
            'title' => 'ADMIN HOME PAGE',
            'subtitle1' => 'TCG Cards',
            'subtitle2' => 'TCG Packs',
            'tcgCards' => $tcgCards
        ];
        return view('admin.index')->with('viewData', $viewData);;
    }
}
