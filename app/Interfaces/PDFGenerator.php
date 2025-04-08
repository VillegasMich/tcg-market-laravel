<?php

namespace App\Interfaces;
use Illuminate\Http\Response;

interface PDFGenerator
{
    function generate(string $view, array $data, string $filename): Response;
}
