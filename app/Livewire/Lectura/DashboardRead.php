<?php

namespace App\Livewire\Lectura;

use Livewire\Component;
use App\Models\Maquina;
use App\Models\MaquinasSalida;

class DashboardRead extends Component
{
    public function render()
    {
        $maquinas = Maquina::where('usuario_lectura', auth()->user()->id)->orderBy('id', 'desc')->get();
        $maquinas_salidas = MaquinasSalida::orderBy('maquina_id', 'asc')->get();

        return view('livewire.lectura.dashboard-read', compact('maquinas'))->with('maquinas_salidas', $maquinas_salidas);
    }
}
