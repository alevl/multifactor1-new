<?php

namespace App\Livewire\Franquiciado;

use Livewire\Component;
use App\Models\Lectura;
use App\Models\Maquina;

class LecturasF extends Component
{
    public function render()
    {
        $maquinas = Maquina::where('usuario_id', auth()->user()->id)->orderBy('id','asc')->get();
        $lecturas = Lectura::where('usuario_id', auth()->user()->id)->orderBy('id','desc')->get();
        
        return view('livewire.franquiciado.lecturas-f', compact('maquinas'))->with('lecturas', $lecturas);
    }
}
