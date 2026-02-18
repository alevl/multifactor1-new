<?php

namespace App\Livewire\Franquiciado;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Maquina;
use App\Models\MaquinasSalida;
use App\Models\User;
use App\Models\EstatusUser;

class Dispositivos extends Component
{
    use WithPagination;

    public $search, $id, $propietario_id, $usuario_id, $nombre_editar, $maquina_editar, $lista_usu=[], $lista_mod=[], $maquina, $id_maquina_editar, $numero_salidas, $id_maquina, $lista_estatus=[], $nombre;
    public $id_maquina_crear, $propietario_id_crear, $usuario_id_crear, $numero_salidas_crear, $maquina_crear, $estatus_id;
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
        $this->lista_estatus = EstatusUser::orderBy('id','desc')->get();

        $maquinas = Maquina::where('usuario_id', auth()->user()->id)
        ->where(function($q)
        {
            $q->orwhere('id_maquina', 'like', '%' . $this->search . '%');
            $q->orwhere('created_at', 'like', '%' . $this->search . '%');
            $q->orwhere('numero_salidas', 'like', '%' . $this->search . '%');
            $q->orwhere('nombre', 'like', '%' . $this->search . '%');
 
            $q->orWhereHas('maquina_estatus', function($query) {
                return $query->where('estatus', 'like', '%' . $this->search . '%');
            });
        })
        ->orderBy($this->sort, $this->direccion)
        ->paginate($this->cant);

        return view('livewire.franquiciado.dispositivos', compact('maquinas'));
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
        $this->numero_salidas = $maquina_editar['numero_salidas'];
        $this->estatus_id = $maquina_editar['estatus_id'];
        $this->nombre = $maquina_editar['nombre'];

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
            'estatus_id' => 'required|max:5',
            'nombre' => 'max:20',
        ]);

        $actualizar = Maquina::where('id', $this->id)
        ->update([
            'estatus_id' => $this->estatus_id,
            'nombre' => $this->nombre,
        ]);

        $this->reset(['open_edit', 'estatus_id']);
        $this->dispatch('alert','Updated Machine');
    }
}
