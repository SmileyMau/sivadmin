<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SesionAsunto extends Model
{
    use HasFactory;

     protected $fillable = [
        'id_sesion',
        'id_asunto',
        'orden',
        'status',
        'user_modifi',
    ];

    public function sesion()
    {
        return $this->belongsTo(Sesiones::class, 'id_sesion');
    }

    public function asunto()
    {
        return $this->belongsTo(Asunto::class, 'id_asunto');
    }

    public function votaciones()
    {
        return $this->hasMany(VotoAsunto::class, 'id_asunto', 'id');
    }
}
