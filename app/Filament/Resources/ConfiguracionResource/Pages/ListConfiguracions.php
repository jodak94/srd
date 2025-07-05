<?php

namespace App\Filament\Resources\ConfiguracionResource\Pages;

use App\Filament\Resources\ConfiguracionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListConfiguracions extends ListRecords
{
    protected static string $resource = ConfiguracionResource::class;

    protected function getHeaderActions(): array
    {
        return \App\Models\Configuracion::count() === 0
            ? [\Filament\Actions\CreateAction::make()]
            : []; // No mostrar nada si ya existe
    }

    public function mount(): void
    {
        $config = \App\Models\Configuracion::first();

        if ($config) {
            $this->redirect(ConfiguracionResource::getUrl('edit', ['record' => $config]));
        }
    }
}
