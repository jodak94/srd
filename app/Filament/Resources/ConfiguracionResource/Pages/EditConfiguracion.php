<?php

namespace App\Filament\Resources\ConfiguracionResource\Pages;

use App\Filament\Resources\ConfiguracionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditConfiguracion extends EditRecord
{
    protected static string $resource = ConfiguracionResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $record = $this->record;

        if ($record->firma_decano && $record->firma_decano !== $data['firma_decano']) {
            \Storage::disk('local')->delete($record->firma_decano);
        }

        if ($record->firma_secretaria && $record->firma_secretaria !== $data['firma_secretaria']) {
            \Storage::disk('local')->delete($record->firma_secretaria);
        }

        return $data;
    }
}
