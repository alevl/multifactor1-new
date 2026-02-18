<?php

namespace App\Livewire\Franquiciado;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Maquina;

class Alertas extends Component
{
    use WithPagination;

    public $search, $id, $propietario_id, $usuario_id, $nombre_editar, $maquina_editar, $lista_usu=[], $lista_mod=[], $maquina, $id_maquina_editar, $numero_salidas, $id_maquina, $lista_estatus=[], $nombre, $lectura_minima, $lectura_maxima, $email1, $email2, $email3;
    public $sort = 'id_maquina';
    public $direccion = 'asc';
    public $cant = 50;
    public $readyToLoad = false;
    public $open_edit = false;
    public $open_crear = false;

    protected $listeners = ['render'=>'render'];

    public function updatingSearch()
    { 
        $this->resetPage();
    }

    public function mount(){
        $this->maquina = new Maquina();
    }

    public function render()
    {
        $maquinas = Maquina::where('usuario_id', auth()->user()->id)
        ->where(function($q)
        {
            $q->orwhere('id_maquina', 'like', '%' . $this->search . '%');
            $q->orwhere('nombre', 'like', '%' . $this->search . '%');
            $q->orwhere('email1', 'like', '%' . $this->search . '%');
            $q->orwhere('email2', 'like', '%' . $this->search . '%');
            $q->orwhere('email3', 'like', '%' . $this->search . '%');
 
            $q->orWhereHas('maquina_estatus', function($query) {
                return $query->where('estatus', 'like', '%' . $this->search . '%');
            });
        })
        ->orderBy($this->sort, $this->direccion)
        ->paginate($this->cant);

        return view('livewire.franquiciado.alertas', compact('maquinas'));
    }

    public function loadUsuarios()
    {
        $this->readyToLoad = true;
    }

    public function edit(Maquina $maquina_editar)
    {
        $this->maquina_editar = $maquina_editar;
        $this->id = $maquina_editar['id'];
        $this->id_maquina_editar = $maquina_editar['id_maquina'];
        $this->nombre = $maquina_editar['nombre'];
        $this->lectura_minima = $maquina_editar['lectura_minima'];
        $this->lectura_maxima = $maquina_editar['lectura_maxima'];
        $this->email1 = $maquina_editar['email1'];
        $this->email2 = $maquina_editar['email2'];
        $this->email3 = $maquina_editar['email3'];

        $this->open_edit = true;
    }

    public function order($sort)
    {
        if($this->sort == $sort)
        {
            if($this->direccion == 'desc') 
            {
                $this->direccion = 'asc';
            }
            else 
            {
                $this->direccion = 'desc';
            }
        }
        else
        {
            $this->sort = $sort;
            $this->direccion = 'asc';
        }
    }

    public function update()
    {
        $this->validate([
            'email1' => 'required|email|max:100',
            'email2' => 'email|max:100',
            'email3' => 'email|max:100',
            'lectura_minima' => 'required|numeric|max:100|min:-100',
            'lectura_maxima' => 'required|numeric|max:100|min:-100',
        ]);

        $actualizar = Maquina::where('id', $this->id)
        ->update([
            'lectura_minima' => $this->lectura_minima,
            'lectura_maxima' => $this->lectura_maxima,
            'email1' => $this->email1,
            'email2' => $this->email2,
            'email3' => $this->email3,
        ]);

        $this->reset(['open_edit', 'lectura_minima', 'lectura_maxima','id_maquina_editar','nombre','email1','email2','email3']);
        $this->dispatch('alert','Updated Machine');
    }
}
