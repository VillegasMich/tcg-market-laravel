<?php

namespace App\Validators;

class ItemValidator
{
    public static $rules = [
        'quantity' => 'required | numeric',
        'subtotal' => 'required | numeric',
    ];
}
