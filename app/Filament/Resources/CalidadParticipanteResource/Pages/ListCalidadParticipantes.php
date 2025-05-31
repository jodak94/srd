<?php

namespace App\Filament\Resources\CalidadParticipanteResource\Pages;

use App\Filament\Resources\CalidadParticipanteResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCalidadParticipantes extends ListRecords
{
    protected static string $resource = CalidadParticipanteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
