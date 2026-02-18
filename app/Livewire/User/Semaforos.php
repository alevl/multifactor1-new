<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Models\Semaforo;
use App\Events\MessageSent;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Cache;

class Semaforos extends Component
{
    #[On('echo:messages,MessageSent')]

    public function onMessageSent($event)
    {
        $this->semaforos = Semaforo::where('usuario_id', auth()->user()->id)->orderBy('id', 'desc')->get();
        json_decode($this->semaforos);
    }

    public function habilitar($maquina)
    {
        $actualizar = Semaforo::where('id', $maquina)
        ->update([
            'solicitud' => 1,
            'valor' => 1,
        ]);
        $this->dispatch('alert');
    }

    public function deshabilitar($maquina)
    {
        $actualizar = Semaforo::where('id', $maquina)
        ->update([
            'solicitud' => 1,
            'valor' => 0,
        ]);
        $this->dispatch('alert');
    }

    public function render()
    {
        Cache::flush();
        
        $semaforos = Semaforo::where('usuario_id', auth()->user()->id)->orderBy('id', 'desc')->get();

        return view('livewire.user.semaforos', compact('semaforos'));
    }
}
