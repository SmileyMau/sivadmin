<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoArchivoTransparencia extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
    ];

    function archivos()
    {
        return $this->hasMany(ArchivosTransparencia::class, 'id_tipo_archivo');
    }
}
