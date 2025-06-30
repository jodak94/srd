<?php

namespace App\Filament\Resources\DocumentoResource\Pages;

use App\Filament\Resources\DocumentoResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Storage;
use Log;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Carbon\Carbon;
use App\Traits\GeneratesDocumentoPdf;

class CreateDocumento extends CreateRecord
{
    protected static string $resource = DocumentoResource::class;
    use GeneratesDocumentoPdf;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function afterCreate(): void
    {
        $this->generatePdf();
    }
}
