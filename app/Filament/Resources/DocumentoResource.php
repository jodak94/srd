<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DocumentoResource\Pages;
use App\Filament\Resources\DocumentoResource\RelationManagers;
use App\Models\Documento;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\FileUpload; 
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Storage;

class DocumentoResource extends Resource
{
    protected static ?string $model = Documento::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

        public static function form(Form $form): Form
        {
            $año = now()->year;

            $ultimo = Documento::where('nro_registro', 'like', $año . '-%')
                ->orderByDesc('nro_registro')
                ->value('nro_registro');
            if ($ultimo) {
                $numero = (int) substr($ultimo, strpos($ultimo, '-') + 1);
                $nuevoNumero = str_pad($numero + 1, 6, '0', STR_PAD_LEFT);
            } else {
                $nuevoNumero = '000001';
            }
            $nuevoRegistro = $año . '-' . $nuevoNumero;
            return $form
                ->schema([
                    TextInput::make('nro_registro')
                    ->default($nuevoRegistro) 
                    ->disabled(),
                    TextInput::make('anho')
                        ->numeric()
                        ->default(now()->year)
                        ->label('Año'),
                    Select::make('semestre')
                        ->options([
                            1 => '1',
                            2 => '2',
                        ]),
                    TextInput::make('cic')->label('Nro. Documento'),
                    TextInput::make('nombre_apellido'),
                    TextInput::make('nombre_curso'),
                    TextInput::make('carga_horaria'),
                    TextInput::make('edicion')->label('Edición'),
                    TextInput::make('numero_resolucion')->label('Numero resolución'),
                    DatePicker::make('fecha_resolucion')->label('Fecha resolución'),
                    Select::make('sexo')
                        ->options([
                            'M' => 'Masculino',
                            'F' => 'Femenino',
                        ]),
                    Select::make('tipo_curso_id')
                        ->relationship('tipoCurso', 'descripcion')
                        ->required(),
                    Select::make('dependencia_id')
                        ->relationship('dependencia', 'descripcion')
                        ->required(),
                    Select::make('grado_academico_id')
                        ->relationship('gradoAcademico', 'descripcion')
                        ->required(),
                        Select::make('calidad_participante_id')
                        ->relationship('calidadParticipante', 'descripcion')
                        ->required(),    
                    Placeholder::make('')->columnSpan(1),
                    FileUpload::make('resolucion_path')
                        ->label('Archivo Resolución')
                        ->directory('resoluciones')
                        ->preserveFilenames()
                        ->downloadable()
                        ->columnSpan(1),        
                    FileUpload::make('certificado_path')
                        ->label('Archivo Certificado')
                        ->directory('certificados')
                        ->preserveFilenames()
                        ->downloadable()
                        ->columnSpan(1),
                    ]);
        }

    public static function table(Table $table): Table
    {
        
        return $table
            ->columns([
                TextColumn::make('nro_registro')->sortable()->searchable(),
                TextColumn::make('nombre_apellido')->searchable(),
                TextColumn::make('nombre_curso'),
                TextColumn::make('tipoCurso.descripcion')->label('Tipo Curso'),
                TextColumn::make('dependencia.descripcion')->label('Dependencia'),
                TextColumn::make('gradoAcademico.descripcion')->label('Grado Académico'),
                TextColumn::make('calidadParticipante.descripcion')->label('Calidad'),
                TextColumn::make('fecha_resolucion')->date(),
                TextColumn::make('resolucion_path')
                    ->label('Resolución')
                    ->url(fn ($record) => Storage::url($record->resolucion_path))
                    ->openUrlInNewTab(),
                TextColumn::make('certificado_path')
                    ->label('Certificado')
                    ->url(fn ($record) => Storage::url($record->certificado_path))
                    ->openUrlInNewTab(),
                TextColumn::make('pdf_path')
                    ->label('PDF')
                    ->url(fn ($record) => route('documentos.descargar', $record))
                    ->openUrlInNewTab(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListDocumentos::route('/'),
            'create' => Pages\CreateDocumento::route('/create'),
            'edit' => Pages\EditDocumento::route('/{record}/edit'),
        ];
    }

    
}
