<?php

namespace App\Providers;

use App\Interfaces\PDFGenerator;
use App\Util\OrderPDFGenerator;
use App\Util\OrderReceiptPDFGenerator;
use Illuminate\Support\ServiceProvider;

class PDFServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind('invoice.pdf', function () {
            return new OrderPDFGenerator;
        });

        $this->app->bind('receipt.pdf', function () {
            return new OrderReceiptPDFGenerator;
        });
    }
}