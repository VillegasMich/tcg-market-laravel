<?php

namespace App\Validators;

class TCGPackValidator
{
    public static $rules = [
        'name' => 'required|string|max:255',
        'image' => 'image|mimes:jpeg,png,jpg,svg|max:2048',
    ];
}
