<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TCGPackCollection;
use App\Http\Resources\TCGPackResource;
use App\Models\TCGPack;
use Illuminate\Http\JsonResponse;

class TCGPackApiController extends Controller
{
    public function index(): JsonResponse
    {
        $tcgPacks = new TCGPackCollection(TCGPack::all());

        return response()->json($tcgPacks, 200);
    }

    public function paginate(int $numElements): JsonResponse
    {
        $tcgPacks = new TCGPackCollection(TCGPack::paginate($numElements));

        return response()->json($tcgPacks, 200);
    }

    public function show(string $id): JsonResponse
    {
        $tcgPack = new TCGPackResource(TCGPack::findOrFail($id));

        return response()->json($tcgPack, 200);
    }
}
