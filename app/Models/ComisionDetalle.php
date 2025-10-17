<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComisionDetalle extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_user',
        'id_cargo',
        'status',
        'user_modifi',
    ];

    
    public function user()
    {
        return $this->belongsTo(Users::class, 'id_user', 'id');
    }

    public function cargo()
    {
        return $this->belongsTo(Cargo::class, 'id_cargo', 'id');
    }
}
