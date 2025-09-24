<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Errores extends Model
{
    use HasFactory;
    protected $fillable = [
        'codigo',
        'error',
        'fecha',
        'id_user',
        'nombre',
        'archivo',
        'nota',
        'linea',
    ];
}
