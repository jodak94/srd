<?php

namespace App\Filament\Resources\GradoAcademicoResource\Pages;

use App\Filament\Resources\GradoAcademicoResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateGradoAcademico extends CreateRecord
{
    protected static string $resource = GradoAcademicoResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
