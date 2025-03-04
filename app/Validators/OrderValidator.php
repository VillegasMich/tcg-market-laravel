<?php

namespace App\Validators;

class OrderValidator
{
    public static $rules = [
        'total' => 'required | numeric | gt:0',
        'paymentMethod' => 'required',
    ];
}
