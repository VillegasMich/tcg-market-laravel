<?php

namespace App\Validators;

class TCGCardValidator
{
    public static $rules = [
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'franchise' => 'required|string|max:255',
        // 'collection' => 'required|string|max:255', //TODO:
        'price' => 'required|numeric|min:1',
        'PSAgrade' => 'required|string|max:10',
        'image' => 'image|mimes:jpeg,png,jpg,svg|max:2048',
        'launchDate' => 'required|date',
        'rarity' => 'required',
        'pullRate' => 'required|decimal:1|min:0|max:1',
        'language' => 'required|in:english,spanish,french, german',
        'stock' => 'required|integer|min:1',
    ];
}
