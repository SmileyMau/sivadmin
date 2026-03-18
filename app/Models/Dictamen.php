<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dictamen extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'id_sesion_detalle',
        'archivo',
        'status',
        'user_modifi'
    ];

    function user() {
        return $this->belongsTo(User::class, 'id_user');
    }

    function sesionDetalle() {
        return $this->belongsTo(SesionDet::class, 'id_sesion_detalle');
    }
}
