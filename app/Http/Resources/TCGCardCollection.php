<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class TCGCardCollection extends ResourceCollection
{
    public function toArray(Request $request): array
    {
        return [
            'data' => $this->collection,
            'additionalData' => [
                'storeName' => 'TCG Market',
                'storeProductsLink' => env('APP_URL').':8000/tcgcards',
                'requestTime' => Carbon::now()->toDateTimeString(),
            ],
        ];
    }
}
