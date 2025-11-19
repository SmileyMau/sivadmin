<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsuntoDetalle extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_asunto',
        'id_user',
        'status',
        'user_modifi',
    ];

    public function asunto()
    {
        return $this->belongsTo(Asunto::class, 'id_asunto', 'id');
    }
}
