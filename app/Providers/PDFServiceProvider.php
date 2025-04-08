<?php

namespace App\Providers;

use App\Interfaces\PDFGenerator;
use App\Util\OrderPDFGenerator;
use Illuminate\Support\ServiceProvider;

class PDFServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(PDFGenerator::class, function () {
            return new OrderPDFGenerator;
        });
    }
}