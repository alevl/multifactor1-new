<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Maquina;

class ImprimirQR extends Component
{
    public $id_maquina;

    public function mount($id_maquina)
    {
        $this->id_maquina = $id_maquina;
    }

    public function render()
    {
        return view('livewire.imprimir-q-r');
    }
}
