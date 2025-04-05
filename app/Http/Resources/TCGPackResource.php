<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TCGPackResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'franchise' => $this->getFranchise(),
            'image' => $this->getImage(),
            'showLink' => env('APP_URL').':8000'.'/tcgpacks/'.$this->getId(),
        ];
    }
}
