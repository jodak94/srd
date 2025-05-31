<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    protected $fillable = [
        'nro_registro',
        'anho',
        'semestre',
        'cic',
        'nombre_apellido',
        'nombre_curso',
        'carga_horaria',
        'edicion',
        'numero_resolucion',
        'fecha_resolucion',
        'sexo',
        'resolucion_path',
        'certificado_path',
        'tipo_curso_id',
        'dependencia_id',
        'grado_academico_id',
        'calidad_participante_id',
        'pdf_path',
        'qr',
        'fecha_inicio',
        'fecha_fin'
    ];

    public static function boot()
    {
        parent::boot();
        static::creating(function (Documento $documento) {
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
            $documento->nro_registro = $nuevoRegistro;
        });
    }

    public function tipoCurso() {
        return $this->belongsTo(TipoCurso::class);
    }

    public function dependencia() {
        return $this->belongsTo(Dependencia::class);
    }

    public function gradoAcademico() {
        return $this->belongsTo(GradoAcademico::class);
    }

    public function calidadParticipante() {
        return $this->belongsTo(CalidadParticipante::class);
    }
}
