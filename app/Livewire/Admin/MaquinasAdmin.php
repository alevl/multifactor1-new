<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Maquina;
use App\Models\MaquinasSalida;
use App\Models\User;
use App\Events\MessageSent;

class MaquinasAdmin extends Component
{
    use WithPagination;

    public $search, $id, $propietario_id, $usuario_id, $nombre_editar, $maquina_editar, $lista_usu=[], $lista_mod=[], $maquina, $id_maquina_editar, $numero_salidas, $id_maquina;
    public $id_maquina_crear, $propietario_id_crear, $usuario_id_crear, $numero_salidas_crear, $maquina_crear, $modelo_crear, $modelo;
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
        $this->lista_usu = User::orderBy('name','asc')->get();

        $maquinas = Maquina::
        where(function($q)
        {
            $q->orwhere('id_maquina', 'like', '%' . $this->search . '%');
            $q->orwhere('created_at', 'like', '%' . $this->search . '%');
            $q->orwhere('numero_salidas', 'like', '%' . $this->search . '%');
 
            $q->orWhereHas('maquina_propietario', function($query) {
                return $query->where('name', 'like', '%' . $this->search . '%');
            });
            $q->orWhereHas('maquina_usuario', function($query) {
                return $query->where('name', 'like', '%' . $this->search . '%');
            });
        })
        ->orderBy($this->sort, $this->direccion)
        ->paginate($this->cant);

        return view('livewire.admin.maquinas-admin', compact('maquinas'));
    }

    public function loadUsuarios()
    {
        $this->readyToLoad = true;
    }

    public function edit(Maquina $maquina_editar)
    {
        $this->maquina_editar = $maquina_editar;
        $this->id = $maquina_editar['id'];
        $this->propietario_id = $maquina_editar['propietario_id'];
        $this->usuario_id = $maquina_editar['usuario_id'];
        $this->id_maquina_editar = $maquina_editar['id_maquina'];
        $this->numero_salidas = $maquina_editar['numero_salidas'];
        $this->modelo = $maquina_editar['modelo'];

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
            'propietario_id' => 'required|max:5',
            'usuario_id' => 'required|max:5',
            'modelo' => 'required',
        ]);

        $actualizar = Maquina::where('id', $this->id)
        ->update([
            'propietario_id' => $this->propietario_id,
            'usuario_id' => $this->usuario_id,
            'modelo' => $this->modelo,
        ]);

        $actualizar = MaquinasSalida::where('maquina_id', $this->id)
        ->update([
            'propietario_id' => $this->propietario_id,
            'usuario_id' => $this->usuario_id,
        ]);

        $this->reset(['open_edit', 'propietario_id','usuario_id','modelo']);
        $this->dispatch('alert','Updated Machine');
    }

    public function save()
    {
        $this->validate([
            'id_maquina' => 'required|max:15|unique:maquinas',
            'propietario_id_crear' => 'required|max:5',
            'usuario_id_crear' => 'required|max:5',
            'numero_salidas_crear' => 'required|max:5',
            'modelo_crear' => 'required|max:5',
        ]);

        $maquina = Maquina::create([
            'id_maquina' => $this->id_maquina,
            'propietario_id' => $this->propietario_id_crear,
            'usuario_id' => $this->usuario_id_crear,
            'numero_salidas' => $this->numero_salidas_crear,
            'modelo' => $this->modelo_crear,
            'qr' => '',
            'estatus_id' => 1,
        ]);

        if($this->numero_salidas_crear == 1)
        {
            $salida = MaquinasSalida::create([
                'maquina_id' => $maquina->id,
                'id_maquina' => $this->id_maquina,
                'usuario_id' => $this->usuario_id_crear,
                'propietario_id' => $this->propietario_id_crear,
                'salida' => 1,    
            ]);
        }
        else
        {
            if($this->numero_salidas_crear == 2)
            {
                $salida = MaquinasSalida::create([
                    'maquina_id' => $maquina->id,
                    'id_maquina' => $this->id_maquina,
                    'usuario_id' => $this->usuario_id_crear,
                    'propietario_id' => $this->propietario_id_crear,
                    'salida' => 1,
                ]);

                $salida = MaquinasSalida::create([
                    'maquina_id' => $maquina->id,
                    'id_maquina' => $this->id_maquina,
                    'usuario_id' => $this->usuario_id_crear,
                    'propietario_id' => $this->propietario_id_crear,
                    'salida' => 2,
                ]);
            }
            else
            {
                if($this->numero_salidas_crear == 3)
                {
                    $salida = MaquinasSalida::create([
                        'maquina_id' => $maquina->id,
                        'id_maquina' => $this->id_maquina,
                        'usuario_id' => $this->usuario_id_crear,
                        'propietario_id' => $this->propietario_id_crear,
                        'salida' => 1,
                    ]);
                    $salida = MaquinasSalida::create([
                        'maquina_id' => $maquina->id,
                        'id_maquina' => $this->id_maquina,
                        'usuario_id' => $this->usuario_id_crear,
                        'propietario_id' => $this->propietario_id_crear,
                        'salida' => 2,
                    ]);
                    $salida = MaquinasSalida::create([
                        'maquina_id' => $maquina->id,
                        'id_maquina' => $this->id_maquina,
                        'usuario_id' => $this->usuario_id_crear,
                        'propietario_id' => $this->propietario_id_crear,
                        'salida' => 3,
                    ]);
                }
            }
        }

        $this->reset(['open_crear', 'id_maquina', 'propietario_id_crear', 'usuario_id_crear', 'numero_salidas_crear', 'modelo_crear']);

        $this->dispatch('render');
        $this->dispatch('alert','Registered Machine');
    }

    public function delete($maquinaId)
    {
        $actualizar = Maquina::where('id', $maquinaId)->delete();
    }
}
