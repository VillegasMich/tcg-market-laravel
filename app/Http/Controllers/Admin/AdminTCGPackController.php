<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TCGPack;
use Illuminate\Contracts\View\View;

class AdminTCGPackController extends Controller
{
    public function index(): View
    {
        $tcgPacks = TCGPack::paginate(10);
        $viewData = [
            'subtitle1' => 'TCG Packs',
            'tcgPacks' => $tcgPacks
        ];
        return view('admin.tcgPack.index')->with('viewData', $viewData);
    }
}
