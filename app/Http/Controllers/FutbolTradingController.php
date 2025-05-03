<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Http as IlluminateHttp;
use Illuminate\View\View;

class FutbolTradingController extends Controller
{
    public function index(Request $request): View
    {
        $page = $request->input('page', 1);
        $perPage = 20;
        $response = IlluminateHttp::get(config('futbolTrading.base_url'));
        if ($response->successful()) {
            $futbolTradingCards = $response->json('data');
        } else {
            $futbolTradingCards = [];
        }
        $totalCards = count($futbolTradingCards);
        $offset = ($page - 1) * $perPage;
        $cardsForPage = array_slice($futbolTradingCards, $offset, $perPage);
        $paginatedCards = new LengthAwarePaginator(
            $cardsForPage,
            $totalCards,
            $perPage,
            $page,
            ['path' => url()->current(), 'query' => $request->query()]
        );
        $viewData = [
            'futbolTradingCards' => $paginatedCards,
        ];

        return view('futbolTrading.index')->with('viewData', $viewData);
    }
}
