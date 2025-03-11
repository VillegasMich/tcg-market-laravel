<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface ImageStorage
{
    public function store(string $id, Request $request): void;
}
