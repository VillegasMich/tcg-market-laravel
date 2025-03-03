<?php

namespace App\Validators;

class TCGPackValidator
{
    public static $rules = [
        'name' => 'required|string|max:255',
        'image' => 'required|string',
    ];
}
