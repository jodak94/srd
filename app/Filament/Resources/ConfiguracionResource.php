<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ConfiguracionResource\Pages;
use App\Filament\Resources\ConfiguracionResource\RelationManagers;
use App\Models\Configuracion;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ConfiguracionResource extends Resource
{
    protected static ?string $model = Configuracion::class;

    protected static ?string $navigationIcon = 'heroicon-s-cog';
    protected static ?string $navigationGroup = 'Parámetros';
    protected static ?string $pluralLabel = 'Configuraciones';
    protected static ?string $slug = 'configuracion';

    public static function canCreate(): bool
    {
        return Configuracion::count() === 0;
    }


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nombre_decano')
                    ->required()
                    ->label('Nombre del Decano'),

                Forms\Components\FileUpload::make('firma_decano')
                    ->label('Firma del Decano')
                    ->image()
                    ->directory('firmas')
                    ->disk('local'),

                Forms\Components\TextInput::make('nombre_secretaria')
                    ->required()
                    ->label('Nombre de la Secretaria'),

                Forms\Components\FileUpload::make('firma_secretaria')
                    ->label('Firma de la Secretaria')
                    ->image()
                    ->directory('firmas')
                    ->disk('local'),

                Forms\Components\FileUpload::make('sello')
                    ->label('Sello')
                    ->image()
                    ->directory('sello')
                    ->disk('local'),    
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nombre_decano'),
                Tables\Columns\ImageColumn::make('firma_decano')->size(50),
                Tables\Columns\TextColumn::make('nombre_secretaria'),
                Tables\Columns\ImageColumn::make('firma_secretaria')->size(50),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListConfiguracions::route('/'),
            'create' => Pages\CreateConfiguracion::route('/create'),
            'edit' => Pages\EditConfiguracion::route('/{record}/edit'),
        ];
    }
}
