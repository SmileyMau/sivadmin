<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VotoAsunto extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'id_sesion_asunto',
        'fecha',
        'votacion',
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
