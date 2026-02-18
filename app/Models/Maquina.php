<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maquina extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_maquina',
        'modelo',
        'propietario_id',
        'nombre',
        'usuario_id',
        'reloj',
        'dia_id',
        'deshielo',
        'qr',
        'numero_salidas',
        'estatus_estado_id',
        'estatus_maquina_id',
        'maquina_registrada',
        'device_time',
        'device_day',
        'estatus_device',
        'chorizo',
        'dia_solicitado',
        'reloj_solicitado',
        'lectura_minima',
        'lectura_maxima',
        'estatus_ajuste',
        'signo_ajuste',
        'entero_ajuste',
        'punto_ajuste',
        'decimal_ajuste',
        'estatus_sistema',
        'temperatura',
        'humedad',
        'ajuste_temperatura',
        'ajuste_humedad',
        'usuario_lectura',
        'estatus_id',
        'email1',
        'email2',
        'email3',
        'entero_ajuste_hum',
        'punto_ajuste_hum',
        'decimal_ajuste_hum',
        'estatus_ajuste_hum',
        'signo_ajuste_hum',
        'voltaje',
        'factor_voltaje',
        'ajuste_voltaje',
        'estatus_voltaje',
        'encendido_permanente'
    ];

    public function maquina_propietario()
    {
        return $this->belongsTo(User::class, 'propietario_id');
    }
    public function maquina_usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }
    public function maquina_dia()
    {
        return $this->belongsTo(Dia::class, 'dia_id');
    }
    public function maquina_estatus()
    {
        return $this->belongsTo(EstatusUser::class, 'estatus_id');
    }
}
