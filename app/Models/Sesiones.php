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
        'asistencia_pdf',
        'orden_pdf',
        'ordenpublic_pdf',
        'acta_pdf',
        'diario_pdf',
        'link',
        'com_estado_pdf',
        'com_federal_pdf',
        'exhortos_pdf',
        'status',
        'publico',
    ];

    public function asistencias()
    {
        return $this->hasMany(Asistencias::class, 'id_sesion', 'id');
    }
}
