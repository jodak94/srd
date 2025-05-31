<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Documento;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class DocumentoController extends Controller
{
    public function descargarPdf(Documento $documento): Response
    {

        if (!Storage::disk('local')->exists($documento->pdf_path)) {
            abort(404);
        }

        return Storage::download($documento->pdf_path);
    }
}
