<?php

namespace App\Validators;

class TCGCardValidator
{
    public static $rules = [
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'franchise' => 'required|string|max:255',
        'collection' => 'required|string|max:255',
        'price' => 'required|numeric|min:0',
        'PSAgrade' => 'required|string|max:10',
        'image' => 'string',
        'launchDate' => 'required|date',
        'rarity' => 'required|inAmazing Rare, Common, LEGEND, Promo, Rare, Rare ACE, Rare BREAK, Rare Holo, Rare Holo EX, Rare Holo GX, Rare Holo LV.X, Rare Holo Star, Rare Holo V, Rare Holo VMAX, Rare Prime, Rare Prism Star, Rare Rainbow, Rare Secret, Rare Shining, Rare Shiny, Rare Shiny GX, Rare Ultra, Uncommon
',
        'pullRate' => 'required|float|max:255',
        'language' => 'required|in:Spanish,English,French',
        'stock' => 'required|integer|min:0',
    ];
}
