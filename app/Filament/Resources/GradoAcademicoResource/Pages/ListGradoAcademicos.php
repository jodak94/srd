<?php

namespace App\Filament\Resources\GradoAcademicoResource\Pages;

use App\Filament\Resources\GradoAcademicoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGradoAcademicos extends ListRecords
{
    protected static string $resource = GradoAcademicoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
