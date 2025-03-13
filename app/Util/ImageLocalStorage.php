<?php

namespace App\Util;

use App\Interfaces\ImageStorage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageLocalStorage implements ImageStorage
{
    public function store(string $id, Request $request): string
    {
        $imageName = $id.'.'.$request->file('image')->extension();
        Storage::disk('public')->put(
            $imageName,
            file_get_contents($request->file('image')->getRealPath())
        );

        return $imageName;
    }
}
