<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaquinasSalida extends Model
{
    use HasFactory;

    protected $fillable = [
        'maquina_id',
        'id_maquina',
        'usuario_id',
        'propietario_id',
        'nombre',
        'salida',
        'estatus_estado_id',
        'estatus_maquina_id',
        'uno',
        'dos',
        'tres',
        'cuatro',
        'point',
        'turn_on',
        'turn_off',
        'estatus_turn',
        'set_point',
        'estatus_point',
        'hora_encendido',
        'hora_apagado',
        'turnon_solicitado',
        'turnoff_solicitado',
        'setpoint_solicitado',
        'point1',
        'point2',
        'estatus_salida_manual',
        'set_pont1_entero',
        'set_pont1_decimal',
        'set_pont2_entero',
        'set_pont2_decimal',
        'estatus_frecuencia',
        'mostrar_frecuencia',
        'mostrar_duracion',
        'duracion_solicitado',
        'frecuencia_solicitado',
        'modo_salida',
        'parametro1',
        'parametro2',
        'parametro3',
        'parametro4',
        'modo_salida_solicitado',
        'parametro1_solicitado',
        'parametro2_solicitado',
        'parametro3_solicitado',
        'parametro4_solicitado',
        'estatus_parametros',
    ];
}
