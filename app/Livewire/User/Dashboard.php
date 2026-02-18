<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Models\Maquina;
use App\Models\MaquinasSalida;
use App\Models\Dia;
use App\Models\Minuto;
use App\Models\Hora;

class Dashboard extends Component
{
    public $open_edit = false;
    public $open_salida = false;
    public $open_edit_maquina = false;
    public $lista_dias=[], $hora_reloj, $minuto_reloj, $dia_id, $hora_ton, $hora_toff, $minuto_ton, $minuto_toff, $setpoint, $lista_horas=[], $lista_minutos=[];
    public $name_maquina, $name_salida, $id_maquina, $id_salida;
    public $maquina, $salida;

    public function render()
    {
        $this->lista_dias = Dia::orderBy('id', 'asc')->get();
        $this->lista_minutos = Minuto::orderBy('id', 'asc')->get();
        $this->lista_horas = Hora::orderBy('id', 'asc')->get();
        $maquinas = Maquina::where('usuario_id', auth()->user()->id)->orderBy('id', 'desc')->get();
        $maquinas_salidas = MaquinasSalida::orderBy('maquina_id', 'asc')->get();

        return view('livewire.user.dashboard', compact('maquinas'))->with('maquinas_salidas', $maquinas_salidas);
    }

    public function edit($maquina, $salida)
    {
        $this->maquina = $maquina;
        $this->salida = $salida;

        $this->open_edit = true;
    }

    public function edit_name_salida(MaquinasSalida $salida_editar)
    {
        $this->id_salida = $salida_editar['id'];
        $this->name_salida = $salida_editar['nombre'];

        $this->open_salida = true;
    }

    public function edit_name_maquina(Maquina $maquina_editar)
    {
        $this->id_maquina = $maquina_editar['id'];
        $this->name_maquina = $maquina_editar['nombre'];

        $this->open_edit_maquina = true;
    }

    public function update_maquina(){
        $this->validate([
            'name_maquina' => 'required|max:20',
        ]);

        $actualizar = Maquina::where('id', $this->id_maquina)
        ->update([
            'nombre' => $this->name_maquina,
        ]);

        $this->reset(['open_edit_maquina','name_maquina']);
        $this->dispatch('alert');
    }

    public function update_salida(){
        $this->validate([
            'name_salida' => 'required|max:20',
        ]);

        $actualizar = MaquinasSalida::where('id', $this->id_salida)
        ->update([
            'nombre' => $this->name_salida,
        ]);

        $this->reset(['open_salida','name_maquina']);
        $this->dispatch('alert');
    }

    public function update_device(){
        $this->validate([
            'hora_reloj' => 'required|max:5',
            'minuto_reloj' => 'required|max:5',
            'dia_id' => 'required|max:5',
        ]);

        $actualizar = Maquina::where('id', $this->maquina)
        ->update([
            'estatus_device' => 1,
            'dia_solicitado' => $this->dia_id,
            'reloj_solicitado' => $this->hora_reloj.":".$this->minuto_reloj,
        ]);

        $this->reset(['open_edit','hora_reloj','minuto_reloj','dia_id','setpoint','hora_ton','minuto_ton','hora_toff','minuto_toff']);
        $this->dispatch('alert');
    }
    public function update_turn(){
        $this->validate([
            'hora_ton' => 'required|max:5',
            'minuto_ton' => 'required|max:5',
            'hora_toff' => 'required|max:5',
            'minuto_toff' => 'required|max:5',
        ]);

        $actualizar = MaquinasSalida::where('maquina_id', $this->maquina)
        ->where('salida', $this->salida)
        ->update([
            'estatus_turn' => 1,
            'turnon_solicitado' => $this->hora_ton.":".$this->minuto_ton,
            'turnoff_solicitado' => $this->hora_toff.":".$this->minuto_toff,
        ]);

        $this->reset(['open_edit','hora_reloj','minuto_reloj','dia_id','setpoint','hora_ton','minuto_ton','hora_toff','minuto_toff']);
        $this->dispatch('alert');
    }
    public function update_point(){
        $this->validate([
            'setpoint' => 'required|min:1|max:200.9|numeric',
        ]);

        $valor = number_format($this->setpoint,2) * 10;
        $valor = number_format($valor,0, '.', '');
        $set = dechex($valor);

        $actualizar = MaquinasSalida::where('maquina_id', $this->maquina)
        ->where('salida', $this->salida)
        ->update([
            'estatus_point' => 1,
            'setpoint_solicitado' => $set,
        ]);

        $this->reset(['open_edit','hora_reloj','minuto_reloj','dia_id','setpoint','hora_ton','minuto_ton','hora_toff','minuto_toff']);
        $this->dispatch('alert');
    }
}
