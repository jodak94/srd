<?php

namespace App\Traits;

use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Carbon\Carbon;
use App\Models\Configuracion;
use Storage;

trait GeneratesDocumentoPdf
{
    protected function generatePdf(): void
    {
        $record = $this->record;
        $to_delete = $record->pdf_path;

        $uuid = $record->qr ?? Str::uuid()->toString();
        $qrCode = QrCode::size(300)->generate(route('verificar.documento', ['uuid' => $uuid]));

        $background_path = public_path('images/fondo__.png');
        $imageData = base64_encode(file_get_contents($background_path));
        $backgroundb64 = 'data:image/png;base64,' . $imageData;

        $fechaInicio = Carbon::parse($record->fecha_inicio);
        $fechaFin = Carbon::parse($record->fecha_fin);
        $periodo = 'Realizado en el periodo comprendido entre el ' . 
            $fechaInicio->translatedFormat('j \d\e F \d\e Y') . 
            ' y el ' . 
            $fechaFin->translatedFormat('j \d\e F \d\e Y');
        $config = Configuracion::first();
        $pdf = \PDF::loadView('pdf.documento', [
            'documento' => $record,
            'qrCode' => $qrCode,
            'background' => $backgroundb64,
            'periodo' => $periodo,
            'config' => $config, 
        ])
        ->setPaper('A4', 'landscape')
        ->setOptions([
            'isHtml5ParserEnabled' => true,
            'isRemoteEnabled' => true,
            'defaultFont' => 'Helvetica',
            'dpi' => 124,
        ]);
        $filename = 'documento_' . $record->nro_registro . '.pdf';
        Storage::put('documentos/' . $filename, $pdf->output());

        $record->update([
            'pdf_path' => 'documentos/' . $filename,
            'qr' => $uuid,
        ]);

    }
}
