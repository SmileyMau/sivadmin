<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArchivosTransparencia extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_sesion',
        'id_tipo_archivo',
        'archivo',
        'descripcion'
    ];

    function tipoArchivo()
    {
        return $this->belongsTo(TipoArchivoTransparencia::class, 'id_tipo_archivo');
    }

    function sesion()
    {
        return $this->belongsTo(Sesion::class, 'id_sesion');
    }
}
