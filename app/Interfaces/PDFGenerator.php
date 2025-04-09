<?php

namespace App\Interfaces;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

interface PDFGenerator
{
    public function generate(string $view, array $data, string $filename): Response|JsonResponse;
}
