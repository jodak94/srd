<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocumentoController;
use App\Http\Controllers\VerificacionController;

Route::get('/', function () {
    return view('welcome');
});

//Descargar pdf
Route::middleware(['auth'])->get('/documentos/{documento}/descargar', [DocumentoController::class, 'descargarPdf'])->name('documentos.descargar');

//Verificar pdf    
Route::get('/verificar/{uuid}', [VerificacionController::class, 'verificar'])->name('verificar.documento');
