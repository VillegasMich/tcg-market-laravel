<?php

namespace App\Util;

use App\Interfaces\PDFGenerator;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;

class OrderReceiptPDFGenerator implements PDFGenerator
{
    public function generate(string $view, array $data, string $filename): JsonResponse
    {
        $pdf = Pdf::loadView($view, $data);

        $binary = $pdf->output();

        $filename = 'receipt_'.$data['order']->getId().'.pdf';

        Storage::disk('local')->put($filename, $binary);

        return response()->json([
            'mensaje' => 'PDF guardado localmente',
            'ruta' => $filename,
        ]);
    }
}
