<?php

namespace App\Models\estandares;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estandar extends Model
{
    use HasFactory;

    protected $table = 'blogs';

    protected $fillable =[
        'titulo',
        'proposito',
        'descripcion',
        'sector_productivo',
        'nivel_id',
        'modulo_ocupacional_id'
    ];
    
}
