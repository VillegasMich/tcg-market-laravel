<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http as IlluminateHttp;
use Illuminate\View\View;

class WikiController extends Controller
{
    public function index(Request $request): View
    {
        $cards = [];
        $page = $request->input('page', 1);
        $perPage = 16;
        $keyword = $request->input('q', '');
        if ($keyword) {
            $formattedKeyword = 'name:*'.$keyword.'*';
        } else {
            $formattedKeyword = '';
        }
        $response = IlluminateHttp::withHeaders([
            'X-Api-Key' => config('pokemon.api_key'),
        ])->get(config('pokemon.base_url').'/cards', [
            'page' => $page,
            'pageSize' => $perPage,
            'q' => $formattedKeyword,
        ]);

        if ($response->successful()) {
            $cards = $response->json('data');
            $totalCards = $response->json('totalCount');
        } else {
            $cards = [];
            $totalCards = 0;
        }
        $totalPages = ceil($totalCards / $perPage);
        $viewData = [
            'tcgCards' => $cards,
            'totalCards' => $totalCards,
            'totalPages' => $totalPages,
            'currentPage' => $page,
        ];

        return view('wiki.index')->with('viewData', $viewData);
    }

    public function show(string $id): View|RedirectResponse
    {
        $response = IlluminateHttp::withHeaders([
            'X-Api-Key' => config('pokemon.api_key'),
        ])->get(config('pokemon.base_url').'/cards/'.$id);
        if ($response->successful()) {
            $card = $response->json('data');
        } else {
            return back();
        }
        $viewData = [
            'tcgCard' => $card,
        ];

        return view('wiki.show')->with('viewData', $viewData);
    }
}
