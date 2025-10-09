<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Votaciones extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_user',
        'id_dictamen',
        'fecha',
        'votacion',
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
    
}
