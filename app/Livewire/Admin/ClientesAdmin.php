<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;
use App\Models\EstatusUser;
use App\Models\Nivele;
use App\Models\Maquina;
use Illuminate\Support\Facades\Hash;
use DB;

class ClientesAdmin extends Component
{
    use WithPagination;

    public $search, $id_usuario, $username_editar, $name, $telefono, $estatus_id, $nivel_id, $usuario_editar, $e_estatus, $lista_estatus, $lista_est=[], $lista_niv=[], $cliente, $empresa; 
    public $username, $name_crear, $telefono_crear, $estatus_id_crear, $empresa_crear, $nivel_id_crear;
    public $sort = 'name';
    public $direccion = 'asc';
    public $cant = 50;
    public $readyToLoad = false;
    public $open_edit = false;
    public $open_crear = false;

    protected $listeners = ['render', 'resetear_clave'];

    public function updatingSearch()
    { 
        $this->resetPage();
    }

    public function mount(){
        $this->cliente = new User();
    }

    public function render()
    {
        $this->lista_est = EstatusUser::orderBy('estatus','asc')->get();
        $this->lista_niv = Nivele::orderBy('nivel','asc')->get();

        $clientes = User::where('nivel_id','<>', 1)
        ->where(function($q)
        {
            $q->orwhere('id', 'like', '%' . $this->search . '%');
            $q->orwhere('name', 'like', '%' . $this->search . '%');
            $q->orwhere('telefono', 'like', '%' . $this->search . '%');
            $q->orwhere('empresa', 'like', '%' . $this->search . '%');
 
            $q->orWhereHas('usuario_estatus', function($query) {
                return $query->where('estatus', 'like', '%' . $this->search . '%');
            });
            $q->orWhereHas('usuario_nivel', function($query) {
                return $query->where('nivel', 'like', '%' . $this->search . '%');
            });
            $q->orWhereHas('usuario_propietario', function($query) {
                return $query->where('name', 'like', '%' . $this->search . '%');
            });
        })
        ->orderBy($this->sort, $this->direccion)
        ->paginate($this->cant);

        $clientes_maquinas = Maquina::select("usuario_id", DB::raw("COUNT(*) as total_maquinas"))
        ->groupBy(DB::raw("usuario_id"))
        ->get();

/* SEGUIR CON ESTO MAS ADELANTE, QUE SUME LAS MAQUINAS EN LA MISMA CONSULTA
        $this->clientes_nuevos = DB::table('users')
        ->select('users.*', 'maquinas.*', 'users.estatus_id as estatus_id', DB::raw('count(maquinas.usuario_id) as total_maquinas'))
        ->leftjoin('maquinas', 'maquinas.usuario_id', '=', 'users.id')
        ->where('nivel_id','<>', 1)
        ->orderBy('total_maquinas','desc')
        ->groupBy('users.id')
//        ->orderBy($this->sort, $this->direccion)
        ->get();
*/
        return view('livewire.admin.clientes-admin', compact('clientes'))->with('clientes_maquinas', $clientes_maquinas);
    }

    public function loadUsuarios()
    {
        $this->readyToLoad = true;
    }

    public function edit(User $usuario_editar)
    {
        $this->usuario_editar = $usuario_editar;
        $this->id_usuario = $usuario_editar['id'];
        $this->username_editar = $usuario_editar['username'];
        $this->name = $usuario_editar['name'];
        $this->telefono = $usuario_editar['telefono'];
        $this->e_estatus = $usuario_editar['estatus_id'];
        $this->e_nivel = $usuario_editar['nivel_id'];
        $this->estatus_id = $this->e_estatus;
        $this->nivel_id = $this->e_nivel;
        $this->empresa = $usuario_editar['empresa'];

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

    public function update(){
        $this->validate([
            'username_editar' => 'required|string|max:20',
            'name' => 'required|max:45',
            'telefono' => 'max:20',
            'estatus_id' => 'required|max:5',
            'empresa' => 'max:30',
            'nivel_id' => 'required|max:5',
        ]);

        $actualizar = User::where('id', $this->id_usuario)
        ->update([
            'name' => $this->name,
            'telefono' => $this->telefono,
            'estatus_id' => $this->estatus_id,
            'empresa' => $this->empresa,
            'nivel_id' => $this->nivel_id,
            'estatus_id' => $this->estatus_id
        ]);

        $this->reset(['open_edit', 'estatus_id']);
        $this->dispatch('alert','Updated Client');
    }

    public function save()
    {
        $this->validate([
            'username' => 'required|string|max:20|unique:users',
            'name_crear' => 'required|max:45',
            'telefono_crear' => 'max:20',
            'estatus_id_crear' => 'required|max:5',
            'empresa_crear' => 'max:30',
            'nivel_id_crear' => 'required|max:5',
        ]);

        $usuario = User::create([
            'username' => $this->username,
            'name' => $this->name_crear,
            'telefono' => $this->telefono_crear,
            'nivel_id' => $this->nivel_id_crear,
            'estatus_id' => $this->estatus_id_crear,
            'password' => Hash::make('123456789'),
            'empresa' => $this->empresa_crear,
            'propietario_id' => 1,
        ]);

        $this->reset(['open_crear', 'estatus_id_crear', 'username', 'telefono_crear', 'name_crear', 'empresa_crear', 'nivel_id_crear', 'estatus_id_crear']);

        $this->dispatch('render');
        $this->dispatch('alert','Registered Customer');
    }

    public function resetear_clave($usuarioId)
    {
        $actualizar = User::where('id', $usuarioId)
        ->update([
            'password' => Hash::make('123456789'),
        ]);
    }
}
