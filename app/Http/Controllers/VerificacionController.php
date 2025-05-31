<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Documento;

class VerificacionController extends Controller
{
    public function verificar($uuid){
        $documento = Documento::where('qr', $uuid)->first();

        if (!$documento) {
            abort(404, 'Documento no encontrado');
        }

        return view('verificador', compact('documento'));
    }
}
