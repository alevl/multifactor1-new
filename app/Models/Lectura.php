<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lectura extends Model
{
    use HasFactory;

    protected $fillable = [
        'maquina',
        'usuario_id',
        'temperatura',
        'humedad',
        'fecha',
        'hora',
        'fecha_invertida',
        'usuario_id',
    ];
}
