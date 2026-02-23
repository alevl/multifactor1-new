<?php

namespace App\Livewire\Franquiciado;

use Livewire\Component;
use App\Models\Maquina;
use App\Models\Lectura;

class Mapa extends Component
{
    public $lat=-32.744722, $lon=-71.489444;

    public function render()
    {
        $initialMarkers=[];

        $dispositivos = Maquina::where('usuario_id', auth()->user()->id)->where('latitud','<>', '')->where('longitud','<>', '')->get();
        foreach($dispositivos as $info)
        {
            $marca = [
                'position' => [ 
                    'lat' => (float) $info->latitud,
                    'lng' => (float) $info->longitud
                ], 
                'nombre' => $info->nombre,
                'id_maquina' => $info->id_maquina,
                'latitud' => $info->latitud,
                'longitud' => $info->longitud,
                'voltaje' => $info->voltaje,
                'draggable' => false,
                'optimized' => false,
            ]; 

            $this->lat = $info->latitud;
            $this->lon = $info->longitud;
            array_push($initialMarkers, $marca);
        }
    
        $lecturas = Lectura::where('maquina', '00789AE2')->latest()->take(20)->get()->reverse();

        return view('livewire.franquiciado.mapa', [
            'temps' => $lecturas->pluck('temperatura'),
            'labels' => $lecturas->pluck('created_at')->map(fn($f) => $f->format('H:i:s'))
        ])->with('dispositivos', $dispositivos)->with('initialMarkers', $initialMarkers);

//        return view('livewire.franquiciado.mapa', compact('initialMarkers'))->with('dispositivos', $dispositivos);
    }
}
