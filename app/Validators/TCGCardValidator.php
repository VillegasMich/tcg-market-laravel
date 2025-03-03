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
        'image' => 'required|string',
        'launchDate' => 'required|date',
        'rarity' => 'required|in:common,uncommon,rare,mythic',
        'pullRate' => 'required|string|max:255',
        'language' => 'required|in:Spanish,English,French',
        'stock' => 'required|integer|min:0',
    ];
}
