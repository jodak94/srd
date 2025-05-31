<?php

namespace App\Filament\Resources\GradoAcademicoResource\Pages;

use App\Filament\Resources\GradoAcademicoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGradoAcademico extends EditRecord
{
    protected static string $resource = GradoAcademicoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
