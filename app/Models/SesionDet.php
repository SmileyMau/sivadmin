<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SesionDet extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_sesion',
        'no_dictamen',
        'titulo',
        'descripcion',
        'total',
        'status',
    ];
}
