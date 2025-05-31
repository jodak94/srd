<?php

namespace App\Filament\Resources\DependenciaResource\Pages;

use App\Filament\Resources\DependenciaResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateDependencia extends CreateRecord
{
    protected static string $resource = DependenciaResource::class;
    
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
