<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class TipoCurso extends Model
{
    protected $fillable = [ 
        'codigo',
        'descripcion'
    ];

    public static function boot()
    {
        parent::boot();
        static::creating(function (TipoCurso $tipoCurso) {
            if (empty($tipoCurso->codigo)) {
                $tipoCurso->codigo = Str::slug($tipoCurso->descripcion);
            }
        });
    }

}
