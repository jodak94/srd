<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class GradoAcademico extends Model
{
    protected $fillable = [ 
        'codigo',
        'descripcion'
    ];

    public static function boot()
    {
        parent::boot();
        static::creating(function (GradoAcademico $participacion) {
            if (empty($participacion->codigo)) {
                $participacion->codigo = Str::slug($participacion->descripcion);
            }
        });
    }
}
