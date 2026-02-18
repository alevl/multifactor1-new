<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Maquina;
use App\Models\User;
use DB;

class DashboardAdmin extends Component
{
    public $total_maquinas_activas, $total_maquinas_inactivas, $total_usuarios, $total_franquiciados;

    public function render()
    {
        $this->total_maquinas_activas = Maquina::where('maquina_registrada', 1)->count();
        $this->total_maquinas_inactivas = Maquina::where('maquina_registrada', 0)->count();
        $this->total_usuarios = User::where('nivel_id', 3)->count();
        $this->total_franquiciados = User::where('nivel_id', 2)->count();

        $lista_usuarios = User::where('nivel_id', 3)->orderBy('name', 'asc')->get();
        $lista_franquiciados = User::where('nivel_id', 2)->orderBy('name', 'asc')->get();
        $lista_maquinas = Maquina::orderBy('id_maquina', 'asc')->get();

        return view('livewire.admin.dashboard-admin')->with('lista_usuarios', $lista_usuarios)->with('lista_franquiciados', $lista_franquiciados)->with('lista_maquinas', $lista_maquinas);
    }
}
