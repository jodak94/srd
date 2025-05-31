<?php

namespace App\Filament\Resources\CalidadParticipanteResource\Pages;

use App\Filament\Resources\CalidadParticipanteResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCalidadParticipante extends EditRecord
{
    protected static string $resource = CalidadParticipanteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
