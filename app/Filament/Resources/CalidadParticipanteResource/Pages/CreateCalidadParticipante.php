<?php

namespace App\Filament\Resources\CalidadParticipanteResource\Pages;

use App\Filament\Resources\CalidadParticipanteResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateCalidadParticipante extends CreateRecord
{
    protected static string $resource = CalidadParticipanteResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
