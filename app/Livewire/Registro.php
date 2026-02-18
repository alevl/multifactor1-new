<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Maquina;
use App\Models\MaquinasSalida;
use App\Models\User;

class Registro extends Component
{
    public $id_maquina, $username, $nombre_maquina, $nombre_salida1, $nombre_salida2, $nombre_salida3, $nombre_salida4, $nombre_salida5, $maquina_id, $maquina_salidas;

    public function mount($id_maquina)
    {
        $this->id_maquina = $id_maquina;
    }

    public function render()
    {
        $maquina = Maquina::select('users.*', 'maquinas.*')
        ->join('users', 'maquinas.usuario_id', '=', 'users.id')
        ->where('maquinas.id_maquina', $this->id_maquina)
        ->first();

        $this->maquina_id = $maquina->id;
        $this->maquina_salidas = $maquina->numero_salidas;

        return view('livewire.registro', compact('maquina'));
    }

    public function grabar()
    {
        if($this->maquina_salidas == 1)
        {
            $this->validate([
                'username' => 'required|max:20',
                'nombre_maquina' => 'required|max:20',
                'nombre_salida1' => 'required|max:20',
            ]);

            $buscar = User::where('username', $this->username)->count();

            if($buscar > 0)
            {
                $buscar = User::where('username', $this->username)->first();

                $codigo_usuario = $buscar->id;

                $actualizar1 = Maquina::where('id_maquina', $this->id_maquina)
                ->update([
                    'usuario_id' => $codigo_usuario,
                    'nombre' => $this->nombre_maquina,
                    'maquina_registrada' => 1,
                ]);

                $actualizar2 = MaquinasSalida::where('maquina_id', $this->maquina_id)
                ->where('salida', 1)
                ->update([
                    'nombre' => $this->nombre_salida1,
                ]);

                return redirect()->route('registro', $this->id_maquina);
            }
            else
            {
                $this->dispatch('email_noexiste');
            }
        }
        else
        {
            if($this->maquina_salidas == 2)
            {
                $this->validate([
                    'username' => 'required|max:20',
                    'nombre_maquina' => 'required|max:20',
                    'nombre_salida1' => 'required|max:20',
                    'nombre_salida2' => 'required|max:20',
                ]);

                $buscar = User::where('username', $this->username)->count();

                if($buscar > 0)
                {
                    $buscar = User::where('username', $this->username)->first();

                    $codigo_usuario = $buscar->id;

                    $actualizar1 = Maquina::where('id_maquina', $this->id_maquina)
                    ->update([
                        'usuario_id' => $codigo_usuario,
                        'nombre' => $this->nombre_maquina,
                        'maquina_registrada' => 1,
                    ]);

                    $actualizar2 = MaquinasSalida::where('maquina_id', $this->maquina_id)
                    ->where('salida', 1)
                    ->update([
                        'nombre' => $this->nombre_salida1,
                    ]);
                    $actualizar2 = MaquinasSalida::where('maquina_id', $this->maquina_id)
                    ->where('salida', 2)
                    ->update([
                        'nombre' => $this->nombre_salida2,
                    ]);

                    return redirect()->route('registro', $this->id_maquina);
                }
                else
                {
                    $this->dispatch('email_noexiste');
                }
            }
            else
            {
                if($this->maquina_salidas == 3)
                {
                    $this->validate([
                        'username' => 'required|max:20',
                        'nombre_maquina' => 'required|max:20',
                        'nombre_salida1' => 'required|max:20',
                        'nombre_salida2' => 'required|max:20',
                        'nombre_salida3' => 'required|max:20',
                    ]);

                    $buscar = User::where('username', $this->username)->count();

                    if($buscar > 0)
                    {
                        $buscar = User::where('username', $this->username)->first();

                        $codigo_usuario = $buscar->id;

                        $actualizar1 = Maquina::where('id_maquina', $this->id_maquina)
                        ->update([
                            'usuario_id' => $codigo_usuario,
                            'nombre' => $this->nombre_maquina,
                            'maquina_registrada' => 1,
                        ]);

                        $actualizar2 = MaquinasSalida::where('maquina_id', $this->maquina_id)
                        ->where('salida', 1)
                        ->update([
                            'nombre' => $this->nombre_salida1,
                        ]);
                        $actualizar2 = MaquinasSalida::where('maquina_id', $this->maquina_id)
                        ->where('salida', 2)
                        ->update([
                            'nombre' => $this->nombre_salida2,
                        ]);
                        $actualizar2 = MaquinasSalida::where('maquina_id', $this->maquina_id)
                        ->where('salida', 3)
                        ->update([
                            'nombre' => $this->nombre_salida3,
                        ]);

                        return redirect()->route('registro', $this->id_maquina);
                    }
                    else
                    {
                        $this->dispatch('email_noexiste');
                    }
                }
            }
        }
        $this->dispatch('render');
    }
}
