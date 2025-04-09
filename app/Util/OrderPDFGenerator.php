<?php

namespace App\Util;

use App\Interfaces\PDFGenerator;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Response;

class OrderPDFGenerator implements PDFGenerator
{
    public function generate(string $view, array $data, string $filename): Response
    {
        $pdf = Pdf::loadView($view, $data);

        return $pdf->download($filename);
    }
}
