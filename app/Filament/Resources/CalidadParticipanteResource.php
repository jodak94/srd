<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CalidadParticipanteResource\Pages;
use App\Filament\Resources\CalidadParticipanteResource\RelationManagers;
use App\Models\CalidadParticipante;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CalidadParticipanteResource extends Resource
{
    protected static ?string $model = CalidadParticipante::class;

    protected static ?string $navigationIcon = 'heroicon-o-inbox-stack';
    protected static ?string $label = 'Calidad de Participación';
    protected static ?string $pluralLabel = 'Calidades';
    protected static ?string $navigationGroup = 'Parámetros';

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
            'index' => Pages\ListCalidadParticipantes::route('/'),
            'create' => Pages\CreateCalidadParticipante::route('/create'),
            'edit' => Pages\EditCalidadParticipante::route('/{record}/edit'),
        ];
    }
}
