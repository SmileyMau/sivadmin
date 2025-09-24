<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guion extends Model
{
    use HasFactory;
    protected $fillable = [
        'fecha',
        'titulo',
        'texto',
        'orden_pdf',
    ];
}
