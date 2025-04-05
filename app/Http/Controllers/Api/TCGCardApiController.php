<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TCGCardCollection;
use App\Http\Resources\TCGCardResource;
use App\Models\TCGCard;
use Illuminate\Http\JsonResponse;

class TCGCardApiController extends Controller
{
    public function index(): JsonResponse
    {
        $tcgCards = new TCGCardCollection(TCGCard::all());

        return response()->json($tcgCards, 200);
    }

    public function paginate(int $numElements): JsonResponse
    {
        $tcgCards = new TCGCardCollection(TCGCard::paginate($numElements));

        return response()->json($tcgCards, 200);
    }

    public function show(string $id): JsonResponse
    {
        $tcgCard = new TCGCardResource(TCGCard::findOrFail($id));

        return response()->json($tcgCard, 200);
    }
}
