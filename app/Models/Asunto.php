<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asunto extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_user',
        'id_tipo',
        'fecha',
        'titulo',
        'descripcion',
        'no_oficio',
        'observacion',
        'status',
        'asunto',
        'archivo',
        'user_modifi',
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function tipo()
    {
        return $this->belongsTo(TipoAsunto::class, 'id_tipo', 'id');
    }
}
