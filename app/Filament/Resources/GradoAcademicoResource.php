<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GradoAcademicoResource\Pages;
use App\Filament\Resources\GradoAcademicoResource\RelationManagers;
use App\Models\GradoAcademico;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GradoAcademicoResource extends Resource
{
    protected static ?string $model = GradoAcademico::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';
    protected static ?string $navigationGroup = 'Parámetros';
    protected static ?string $label = 'Grados académicos';
    protected static ?string $pluralLabel = 'Grados académicos';

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
            'index' => Pages\ListGradoAcademicos::route('/'),
            'create' => Pages\CreateGradoAcademico::route('/create'),
            'edit' => Pages\EditGradoAcademico::route('/{record}/edit'),
        ];
    }
}
