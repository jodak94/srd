<?php

namespace App\Filament\Resources\TipoCursoResource\Pages;

use App\Filament\Resources\TipoCursoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTipoCursos extends ListRecords
{
    protected static string $resource = TipoCursoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
