<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TCGCardResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'description' => $this->getDescription(),
            'franchise' => $this->getFranchise(),
            'price' => $this->getPrice(),
            'PSAgrade' => $this->getPSAgrade(),
            'image' => $this->getImage(),
            'launchDate' => $this->getLaunchDate(),
            'rarity' => $this->getRarity(),
            'pullRate' => $this->getPullRate(),
            'language' => $this->getLanguage(),
            'stock' => $this->getStock(),
            'showLink' => env('APP_URL').':8000'.'/tcgcards/'.$this->getId(),
        ];
    }
}
