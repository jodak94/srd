<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Dependencia extends Model
{
    protected $fillable = [ 
        'codigo',
        'descripcion'
    ];

    public static function boot()
    {
        parent::boot();
        static::creating(function (Dependencia $participacion) {
            if (empty($participacion->codigo)) {
                $participacion->codigo = Str::slug($participacion->descripcion);
            }
        });
    }
}