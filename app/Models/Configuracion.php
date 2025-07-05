<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Configuracion extends Model
{
    protected $table = 'configuraciones';
    protected $fillable = [
        'nombre_decano',
        'firma_decano',
        'nombre_secretaria',
        'firma_secretaria',
    ];
}
