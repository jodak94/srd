<?php

namespace App\Filament\Resources\TipoCursoResource\Pages;

use Filament\Notifications\Notification;
use App\Filament\Resources\TipoCursoResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use App\Models\TipoCurso;

class CreateTipoCurso extends CreateRecord
{
    protected static string $resource = TipoCursoResource::class;
    protected static ?string $title = 'Crear Tipo de Curso';

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
