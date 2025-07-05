<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DependenciaResource\Pages;
use App\Filament\Resources\DependenciaResource\RelationManagers;
use App\Models\Dependencia;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DependenciaResource extends Resource
{
    protected static ?string $model = Dependencia::class;
    protected static ?string $navigationGroup = 'Parámetros';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('descripcion')
                    ->label('Descripción')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('descripcion') 
                    ->label('Descripción')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('codigo')
                ->label('Código')
                ->sortable() 
                ->searchable(), 
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListDependencias::route('/'),
            'create' => Pages\CreateDependencia::route('/create'),
            'edit' => Pages\EditDependencia::route('/{record}/edit'),
        ];
    }
}
