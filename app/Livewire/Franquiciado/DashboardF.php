<?php

namespace App\Livewire\Franquiciado;

use Livewire\Component;
use App\Models\Maquina;
use App\Models\MaquinasSalida;
use App\Models\Dia;
use App\Models\Minuto;
use App\Models\Hora;
use App\Events\MessageSent;
use Livewire\Attributes\On;

class DashboardF extends Component
{
    public $open_edit = false;
    public $open_parametros = false;
    public $open_parametros_modelo3 = false;
    public $open_salidas_modelo3 = false;
    public $open_correccion_salidas_modelo3 = false;
    public $open_parametros_modelo4 =false;
    public $open_edit_maquina = false;
    public $lista_dias=[], $hora_reloj, $minuto_reloj, $dia_id, $hora_ton, $hora_toff, $minuto_ton, $minuto_toff, $setpoint, $setpoint2, $lista_horas=[], $lista_minutos=[];
    public $name_maquina, $name_salida, $id_maquina, $id_salida;
    public $maquina, $salida, $temperatura, $humedad, $id_maquina_parametro, $id_id_maquina_parametro;
    public $signo_calibrar, $entero_calibrar, $decimal_calibrar, $frecuencia_deshielo, $duracion_deshielo, $factor_voltaje;
    public $signo_calibrar_hum, $entero_calibrar_hum, $decimal_calibrar_hum, $modo_salida, $parametro1, $parametro2, $seleccion_modo_salida=99, $maquina_cambiar, $salida_cambiar, $nuevo_parametro_hum1, $nuevo_parametro_hum21, $nuevo_parametro_temp1, $nuevo_parametro_hora, $nuevo_parametro_minuto, $nuevo_parametro_hora2, $nuevo_parametro_minuto2, $nuevo_parametro_hum2, $nuevo_parametro_hum22, $nuevo_parametro_temp2, $corr_parametro_hum1, $corr_parametro_hum21, $corr_parametro_temp1, $corr_parametro_hora, $corr_parametro_minuto, $corr_parametro_hora2, $corr_parametro_minuto2, $corr_parametro_hum2, $corr_parametro_hum22, $corr_parametro_temp2;
    public $signo_calibrar_temp, $entero_calibrar_temp, $decimal_calibrar_temp, $nuevo_parametro_frecuencia, $nuevo_parametro_duracion;

    protected $listeners = ['render'=>'render'];

    #[On('echo:messages,MessageSent')]

    public function onMessageSent($event)
    {
        $this->maquinas = Maquina::where('usuario_id', auth()->user()->id)->where('estatus_id',1)->orderBy('id', 'desc')->get();
        $this->maquinas_salidas = MaquinasSalida::orderBy('maquina_id', 'asc')->get();
        json_decode($this->maquinas);
        json_decode($this->maquinas_salidas);
    }

    public function render()
    {
        $this->lista_dias = Dia::orderBy('id', 'asc')->get();
        $this->lista_minutos = Minuto::orderBy('id', 'asc')->get();
        $this->lista_horas = Hora::orderBy('id', 'asc')->get();
        $maquinas = Maquina::where('usuario_id', auth()->user()->id)->where('estatus_id',1)->orderBy('id', 'desc')->get();
        $maquinas_salidas = MaquinasSalida::orderBy('maquina_id', 'asc')->get();

        return view('livewire.franquiciado.dashboard-f', compact('maquinas'))->with('maquinas_salidas', $maquinas_salidas);
    }

    public function encendido_permanente_si($maq)
    {
        $actualizar = Maquina::where('id', $maq)->update([
            'encendido_permanente' => 1,
        ]);
    }

    public function encendido_permanente_no($maq)
    {
        $actualizar = Maquina::where('id', $maq)->update([
            'encendido_permanente' => 0,
        ]);
    }

    public function edit($maquina, $salida)
    {
        $this->maquina = $maquina;
        $this->salida = $salida;

        $this->open_edit = true;
    }

    public function edit_parametros(Maquina $maq)
    {
        $this->id_maquina_parametro = $maq->id;
        $this->id_id_maquina_parametro = $maq->id_maquina;

        $this->open_parametros = true;
    }

    public function edit_parametros_modelo3(Maquina $maq)
    {
        $this->id_maquina_parametro = $maq->id;
        $this->id_id_maquina_parametro = $maq->id_maquina;

        $this->open_parametros_modelo3 = true;
    }

    public function edit_parametros_modelo4(Maquina $maq)
    {
        $this->id_maquina_parametro = $maq->id;
        $this->id_id_maquina_parametro = $maq->id_maquina;

        $this->open_parametros_modelo4 = true;
    }

    public function edit_name_maquina(Maquina $maquina_editar)
    {
        $this->id_maquina = $maquina_editar['id'];
        $this->name_maquina = $maquina_editar['nombre'];

        $this->open_edit_maquina = true;
    }

    public function update_maquina(){
        $this->validate([
            'name_maquina' => 'max:20',
        ]);

        $actualizar = Maquina::where('id', $this->id_maquina)
        ->update([
            'nombre' => $this->name_maquina,
        ]);

        $this->reset(['open_edit_maquina','name_maquina']);
        $this->dispatch('alert');

	
        MessageSent::dispatch();
		
    }

    public function update_device()
    {
        $this->validate([
            'hora_reloj' => 'required|max:5',
            'minuto_reloj' => 'required|max:5',
            'dia_id' => 'required|max:5',
        ]);

        $actualizar = Maquina::where('id', $this->id_maquina_parametro)
        ->update([
            'estatus_device' => 1,
            'dia_solicitado' => $this->dia_id,
            'reloj_solicitado' => $this->hora_reloj.":".$this->minuto_reloj,
        ]);

        $this->reset(['open_parametros','open_parametros_modelo3','frecuencia_deshielo','duracion_deshielo','signo_calibrar','entero_calibrar','decimal_calibrar','hora_reloj','minuto_reloj','dia_id','setpoint','setpoint2','hora_ton','minuto_ton','hora_toff','minuto_toff']);
        $this->dispatch('alert');
    }
    public function update_factor_voltaje()
    {
        $this->validate([
            'factor_voltaje' => 'required|numeric|min:-2|max:2'
        ]);

        $actualizar = Maquina::where('id', $this->id_maquina_parametro)
        ->update([
            'ajuste_voltaje' => $this->factor_voltaje,
            'estatus_voltaje' => 1
        ]);

        $this->reset(['open_parametros','open_parametros_modelo3','open_parametros_modelo4','factor_voltaje']);
        $this->dispatch('alert');
    }
    public function update_point()
    {
        $this->validate([
            'setpoint' => 'required|min:-4|max:60|numeric',
            'setpoint2' => 'required|min:-4|max:60|numeric',
        ]);

        $point1 = $this->setpoint;
        $point2 = $this->setpoint2;

        $parte_dos_1 = 0;
        $parte_dos_2 = 0;
        
        if($point1 < 0)
        {
            $point1 = $point1 * 10;
            $point1 = $point1 * (-1);
            $cociente = intdiv($point1, 100);
            $resto = ($point1 % 100);
            $cociente = $cociente + 128;
            $parte_uno_1 = dechex($cociente);
            $parte_uno_2 = $resto;
        } 
        else
        {
            $point1 = $point1 * 10;
            $cociente = intdiv($point1, 100);
            $resto = ($point1 % 100);
            $parte_uno_1 = dechex($cociente);
            $parte_uno_2 = $resto;
        }
                
        if($point2 < 0)
        {
            $point2 = $point2 * 10;
            $point2 = $point2 * (-1);
            $cociente = intdiv($point2, 100);
            $resto = ($point2 % 100);
            $cociente = $cociente + 128;
            $parte_dos_1 = dechex($cociente);
            $parte_dos_2 = $resto;
        } 
        else
        {
            $point2 = $point2 * 10;
            $cociente = intdiv($point2, 100);
            $resto = ($point2 % 100);
            $parte_dos_1 = dechex($cociente);
            $parte_dos_2 = $resto;
        }

        $actualizar = MaquinasSalida::where('maquina_id', $this->id_maquina_parametro)
        ->where('salida', 1)
        ->update([
            'set_point1_entero' => $parte_uno_1,
            'set_point1_decimal' => $parte_uno_2,
            'set_point2_entero' => $parte_dos_1,
            'set_point2_decimal' => $parte_dos_2,
            'estatus_point' => 1,
        ]);

        $this->reset(['open_parametros','frecuencia_deshielo','duracion_deshielo','signo_calibrar','entero_calibrar','decimal_calibrar','hora_reloj','minuto_reloj','dia_id','setpoint','setpoint2','hora_ton','minuto_ton','hora_toff','minuto_toff']);
        $this->dispatch('alert');
    }
    public function update_calibrar()
    {
        $this->validate([
            'signo_calibrar' => 'required',
            'entero_calibrar' => 'required',
            'decimal_calibrar' => 'required',
        ]);

        $signo = dechex($this->signo_calibrar);
        $entero = dechex($this->entero_calibrar);
        $punto = dechex(46);
        $decimal = dechex($this->decimal_calibrar);

        $actualizar = Maquina::where('id', $this->id_maquina_parametro)
        ->update([
            'signo_ajuste' => $signo,
            'entero_ajuste' => $entero,
            'punto_ajuste' => $punto,
            'decimal_ajuste' => $decimal,
            'estatus_ajuste' => 1,
        ]);
        $this->reset(['open_parametros','open_parametros_modelo3','frecuencia_deshielo','duracion_deshielo','signo_calibrar','entero_calibrar','decimal_calibrar','hora_reloj','minuto_reloj','dia_id','setpoint','setpoint2','hora_ton','minuto_ton','hora_toff','minuto_toff']);
        $this->dispatch('alert');
    }

    public function update_calibrar_temp_modelo3()
    {
        $this->validate([
            'signo_calibrar_temp' => 'required',
            'entero_calibrar_temp' => 'required',
            'decimal_calibrar_temp' => 'required',
        ]);

        $actualizar = Maquina::where('id', $this->id_maquina_parametro)
        ->update([
            'signo_ajuste' => $this->signo_calibrar_temp,
            'entero_ajuste' => $this->entero_calibrar_temp,
            'decimal_ajuste' => $this->decimal_calibrar_temp,
            'estatus_ajuste' => 1,
        ]);
        $this->reset(['open_parametros_modelo3','signo_calibrar_temp','entero_calibrar_temp','hora_reloj','minuto_reloj','dia_id','signo_calibrar_hum','entero_calibrar_hum','decimal_calibrar_hum']);
        $this->dispatch('alert');
    }
    public function update_calibrar_hum()
    {
        $this->validate([
            'signo_calibrar_hum' => 'required',
            'entero_calibrar_hum' => 'required',
            'decimal_calibrar_hum' => 'required',
        ]);

        $actualizar = Maquina::where('id', $this->id_maquina_parametro)
        ->update([
            'signo_ajuste_hum' => $this->signo_calibrar_hum,
            'entero_ajuste_hum' => $this->entero_calibrar_hum,
            'decimal_ajuste_hum' => $this->decimal_calibrar_hum,
            'estatus_ajuste_hum' => 1,
        ]);
        $this->reset(['open_parametros_modelo3','signo_calibrar_hum','signo_calibrar_temp','entero_calibrar_temp','decimal_calibrar_temp','hora_reloj','minuto_reloj','dia_id','entero_calibrar_hum','decimal_calibrar_hum']);
        $this->dispatch('alert');
    }
    public function update_modo_salida()
    {
        $parametro1 = '0';
        $parametro2 = '0';
        $parametro3 = '0';
        $parametro4 = '0';

        if($this->seleccion_modo_salida == '0')
        {
            $parametro1 = '0';
            $parametro2 = '0';
            $parametro3 = '0';
            $parametro4 = '0';
        }
        else
        {
            if($this->seleccion_modo_salida == 16)
            {
                $this->validate([
                    'nuevo_parametro_temp1' => 'required|numeric|min:-20|max:50',
                    'nuevo_parametro_temp2' => 'required|numeric|min:-20|max:50',
                ]);

                $parametro1 = $this->nuevo_parametro_temp1;
                $parametro3 = $this->nuevo_parametro_temp2;

                if($parametro1 < '0')
                {
                    $v1 = 80;
                }
                else
                {
                    $v1 = '0';
                }

                $partes = explode(".", $parametro1);
                
                if(isset($partes[0]))
                {
                    if($parametro1 < '0')
                    {
                        $v2 = substr($partes[0], 1, 1);
                        $v3 = substr($partes[0], 2, 1);
                    }
                    else
                    {
                        $v2 = substr($partes[0], 0, 1);
                        $v3 = substr($partes[0], 1, 1);
                    }
                }
                else
                {
                    $v2 = '0';
                    $v3 = '0';
                }
                if(isset($partes[1]))
                {
                    $v4 = substr($partes[1], 0, 1);
                }
                else
                {
                    $v4 = '0';
                }

                $parametro1 = $v1+$v2;
                $parametro2 = $v3.$v4;
                
                if($parametro3 < '0')
                {
                    $v1 = 80;
                }
                else
                {
                    $v1 = '0';
                }

                $partes = explode(".", $parametro3);
                
                if(isset($partes[0]))
                {
                    if($parametro1 < '0')
                    {
                        $v2 = substr($partes[0], 1, 1);
                        $v3 = substr($partes[0], 2, 1);
                    }
                    else
                    {
                        $v2 = substr($partes[0], 0, 1);
                        $v3 = substr($partes[0], 1, 1);
                    }
                }
                else
                {
                    $v2 = '0';
                    $v3 = '0';
                }
                if(isset($partes[1]))
                {
                    $v4 = substr($partes[1], 0, 1);
                }
                else
                {
                    $v4 = '0';
                }

                $parametro3 = $v1+$v2;
                $parametro4 = $v3.$v4;
            }
            else
            {
                if($this->seleccion_modo_salida == 32)
                {
                    $this->validate([
                        'nuevo_parametro_hum1' => 'required|numeric|min:10|max:99',
                        'nuevo_parametro_hum2' => 'required|numeric|min:10|max:99',
                    ]);

                    $parametro1 = $this->nuevo_parametro_hum1;
                    $parametro3 = $this->nuevo_parametro_hum2;

                    $v1 = '0';

                    $partes = explode(".", $parametro1);
                    
                    if(isset($partes[0]))
                    {
                        $v2 = substr($partes[0], 0, 1);
                        $v3 = substr($partes[0], 1, 1);
                    }
                    else
                    {
                        $v2 = '0';
                        $v3 = '0';
                    }
                    if(isset($partes[1]))
                    {
                        $v4 = substr($partes[1], 0, 1);
                    }
                    else
                    {
                        $v4 = '0';
                    }

                    $parametro1 = $v1+$v2;
                    $parametro2 = $v3.$v4;

                    $v1 = '0';

                    $partes = explode(".", $parametro3);
                    
                    if(isset($partes[0]))
                    {
                        $v2 = substr($partes[0], 0, 1);
                        $v3 = substr($partes[0], 1, 1);
                    }
                    else
                    {
                        $v2 = '0';
                        $v3 = '0';
                    }
                    if(isset($partes[1]))
                    {
                        $v4 = substr($partes[1], 0, 1);
                    }
                    else
                    {
                        $v4 = '0';
                    }

                    $parametro3 = $v1+$v2;
                    $parametro4 = $v3.$v4;
                }
                else
                {
                    if($this->seleccion_modo_salida == 48)
                    {
                        $this->validate([
                            'nuevo_parametro_hora' => 'required|numeric',
                            'nuevo_parametro_minuto' => 'required|numeric',
                            'nuevo_parametro_hora2' => 'required|numeric',
                            'nuevo_parametro_minuto2' => 'required|numeric',
                        ]);

                        $parametro1 = $this->nuevo_parametro_hora;
                        $parametro2 = $this->nuevo_parametro_minuto;
                        $parametro3 = $this->nuevo_parametro_hora2;
                        $parametro4 = $this->nuevo_parametro_minuto2;
                    }
                    else
                    {
                        if($this->seleccion_modo_salida == 64)
                        {
                            $this->validate([
                                'nuevo_parametro_frecuencia' => 'required|numeric',
                                'nuevo_parametro_duracion' => 'required|numeric',
                            ]);

                            $parametro1 = dechex($this->nuevo_parametro_frecuencia);
                            $parametro2 = dechex($this->nuevo_parametro_duracion);
                            $parametro3 = '0';
                            $parametro4 = '0';
                        }
                    }
                }
            }
        }
        $actualizar = MaquinasSalida::where('maquina_id', $this->maquina_cambiar)->where('salida', $this->salida_cambiar)->update([
            'modo_salida_solicitado' => $this->seleccion_modo_salida,
            'parametro1' => '',
            'parametro2' => '',
            'parametro1_solicitado' => $parametro1,
            'parametro2_solicitado' => $parametro2,
            'parametro3_solicitado' => $parametro3,
            'parametro4_solicitado' => $parametro4,
            'estatus_parametros' => 1,
        ]);

        $this->reset(['open_salidas_modelo3','nuevo_parametro_temp1','nuevo_parametro_temp2','nuevo_parametro_hum1','nuevo_parametro_hum2','nuevo_parametro_hum21','nuevo_parametro_hum22','nuevo_parametro_hora','nuevo_parametro_minuto','nuevo_parametro_hora2','nuevo_parametro_minuto2']);
        $this->dispatch('alert');
    }
    public function update_deshielo()
    {
        $this->validate([
            'frecuencia_deshielo' => 'required',
            'duracion_deshielo' => 'required',
        ]);

        $mostrar_frecuencia = $this->frecuencia_deshielo;
        $mostrar_duracion = $this->duracion_deshielo;
        $frecuencia = dechex($this->frecuencia_deshielo);
        $duracion = dechex($this->duracion_deshielo);

        $actualizar = MaquinasSalida::where('maquina_id', $this->id_maquina_parametro)
        ->where('salida', 2)
        ->update([
            'frecuencia_solicitado' => $frecuencia,
            'duracion_solicitado' => $duracion,
            'mostrar_frecuencia' => $mostrar_frecuencia,
            'mostrar_duracion' => $mostrar_duracion,
            'estatus_frecuencia' => 1,
        ]);

        $this->reset(['open_parametros','frecuencia_deshielo','duracion_deshielo','signo_calibrar','entero_calibrar','decimal_calibrar','hora_reloj','minuto_reloj','dia_id','setpoint','setpoint2','hora_ton','minuto_ton','hora_toff','minuto_toff']);
        $this->dispatch('alert');
    }
    public function update_deshielo_disabled()
    {
        $actualizar = MaquinasSalida::where('maquina_id', $this->id_maquina_parametro)
        ->where('salida', 2)
        ->update([
            'frecuencia_solicitado' => 0,
            'duracion_solicitado' => 0,
            'estatus_frecuencia' => 1,
        ]);

        $this->reset(['open_parametros','frecuencia_deshielo','duracion_deshielo','signo_calibrar','entero_calibrar','decimal_calibrar','hora_reloj','minuto_reloj','dia_id','setpoint','setpoint2','hora_ton','minuto_ton','hora_toff','minuto_toff']);
        $this->dispatch('alert');
    }
    public function update_sistema($maquina)
    {
        $actualizar = Maquina::where('id', $maquina)
        ->update([
            'estatus_sistema' => 1,
        ]);
        $this->dispatch('alert');
    }
    public function update_salida_manual1($maquina)
    {
        $actualizar = MaquinasSalida::where('maquina_id', $maquina)
        ->where('salida', 1)
        ->update([
            'estatus_salida_manual' => 1,
        ]);

        $this->dispatch('alert');
    }
    public function update_salida_manual2($maquina)
    {
        $actualizar = MaquinasSalida::where('maquina_id', $maquina)
        ->where('salida', 2)
        ->update([
            'estatus_salida_manual' => 1,
        ]);

        $this->dispatch('alert');
    }
    public function update_salida_manual3($maquina)
    {
        $actualizar = MaquinasSalida::where('maquina_id', $maquina)
        ->where('salida', 3)
        ->update([
            'estatus_salida_manual' => 1,
        ]);

        $this->dispatch('alert');
    }
    public function edit_salidas_modelo3($maq, $sal)
    {   
        $this->maquina_cambiar = $maq;
        $this->salida_cambiar = $sal;
        $this->open_salidas_modelo3 = true;
    }
    public function update_salida3($maquina)
    {
        $actualizar = MaquinasSalida::where('maquina_id', $maquina)
        ->where('salida', 3)
        ->update([
            'estatus_salida_manual' => 1,
        ]);

        $this->dispatch('alert');
    }    
/*    
    public function correccion_salidas_modelo3($maq, $sal)
    {
        $this->maquina_cambiar = $maq;
        $this->salida_cambiar = $sal;

        $consulta = MaquinasSalida::where('maquina_id', $maq)->where('salida', $sal)->first();
        $this->seleccion_modo_salida = $consulta->modo_salida;
        
        if($this->seleccion_modo_salida == 16)
        {
            $this->corr_parametro_temp1 = $consulta->parametro1;
            $this->corr_parametro_temp2 = $consulta->parametro2;
        }
        else
        {
            if($this->seleccion_modo_salida == 32)
            {
                $this->corr_parametro_hum1 = $consulta->parametro1;
                $this->corr_parametro_hum2 = $consulta->parametro2;
            }
            else
            {
                if($this->seleccion_modo_salida == 48)
                {
                    $parte1 = explode(':', $consulta->parametro1);
                    if(isset($parte1[0]))
                    {
                        $this->corr_parametro_hora = $parte1[0];
                    }
                    else
                    {
                        $this->corr_parametro_hora = '';
                    }
                    if(isset($parte1[1]))
                    {
                        $this->corr_parametro_minuto = $parte1[1];
                    }
                    else
                    {
                        $this->corr_parametro_minuto = '';
                    }

                    $parte2 = explode(':', $consulta->parametro2);
                    if(isset($parte2[0]))
                    {
                        $this->corr_parametro_hora2 = $parte2[0];
                    }
                    else
                    {
                        $this->corr_parametro_hora2 = '';
                    }
                    if(isset($parte2[1]))
                    {
                        $this->corr_parametro_minuto2 = $parte2[1];
                    }
                    else
                    {
                        $this->corr_parametro_minuto2 = '';
                    }
                }
                else
                {
                    if($this->seleccion_modo_salida == 64)
                    {

                    }
                }
            }
        }

        $this->open_correccion_salidas_modelo3 = true;
    }
    public function update_correccion_modo_salida()
    {
        $parametro1 = '';
        $parametro2 = '';

        if($this->seleccion_modo_salida == 0)
        {
            $parametro1 = '';
            $parametro2 = '';
        }
        else
        {
            if($this->seleccion_modo_salida == 16)
            {
                $this->validate([
                    'corr_parametro_temp1' => 'required|numeric|min:-20|max:50',
                    'corr_parametro_temp2' => 'required|numeric|min:-20|max:50',
                ]);

                $parametro1 = $this->corr_parametro_temp1;
                $parametro2 = $this->corr_parametro_temp2;
            }
            else
            {
                if($this->seleccion_modo_salida == 32)
                {
                    $this->validate([
                        'corr_parametro_hum1' => 'required|numeric|min:10|max:99',
                        'corr_parametro_hum2' => 'required|numeric|min:10|max:99',
                    ]);

                    $parametro1 = $this->corr_parametro_hum1;
                    $parametro2 = $this->corr_parametro_hum2;
                }
                else
                {
                    if($this->seleccion_modo_salida == 48)
                    {
                        $this->validate([
                            'corr_parametro_hora' => 'required|numeric',
                            'corr_parametro_minuto' => 'required|numeric',
                            'corr_parametro_hora2' => 'required|numeric',
                            'corr_parametro_minuto2' => 'required|numeric',
                        ]);

                        $parametro1 = $this->corr_parametro_hora.':'.$this->corr_parametro_minuto;
                        $parametro2 = $this->corr_parametro_hora2.':'.$this->corr_parametro_minuto2;
                    }
                    else
                    {
                        if($this->seleccion_modo_salida == 64)
                        {

                        }
                    }
                }
            }
        }

        $actualizar = MaquinasSalida::where('maquina_id', $this->maquina_cambiar)->where('salida', $this->salida_cambiar)->update([
            'modo_salida' => $this->seleccion_modo_salida,
            'parametro1_solicitado' => $parametro1,
            'parametro2_solicitado' => $parametro2,
            'estatus_parametros' => 1,
        ]);

        $this->reset(['open_correccion_salidas_modelo3','corr_parametro_temp1','corr_parametro_temp2','corr_parametro_hum1','corr_parametro_hum2','corr_parametro_hum21','corr_parametro_hum22','corr_parametro_hora','corr_parametro_minuto','corr_parametro_hora2','corr_parametro_minuto2']);
        $this->dispatch('alert');
    }
*/        
}
