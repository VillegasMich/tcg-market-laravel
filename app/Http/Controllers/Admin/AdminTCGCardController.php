<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TCGCard;
use Illuminate\Contracts\View\View;

class AdminTCGCardController extends Controller
{
    public function index(): View
    {
        $tcgCards = TCGCard::paginate(10);
        $viewData = [
            'subtitle1' => 'TCG Cards',
            'tcgCards' => $tcgCards
        ];
        return view('admin.tcgCard.index')->with('viewData', $viewData);
    }
}
