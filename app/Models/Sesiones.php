<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sesiones extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_tipo',
        'no_sesion',
        'descripcion',
        'fecha',
        'hora_ini',
        'hora_fin',
        'asistencia',
        'orden_pdf',
        'status',
    ];
}
