<?php

namespace App\Validators;

class WishListValidator
{
    public static $creationRules = [
        'name' => 'required | string',
    ];
}
