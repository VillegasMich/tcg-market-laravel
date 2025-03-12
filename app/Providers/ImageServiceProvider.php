<?php

namespace App\Providers;

use App\Util\ImageLocalStorage;
use Illuminate\Support\ServiceProvider;
use App\Interfaces\ImageStorage;

class ImageServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(ImageStorage::class, function () {
            return new ImageLocalStorage();
        });
    }
}
