<?php
use App\Events\MessageSent;
use Livewire\Attributes\On;
use Livewire\Volt\Component;
use App\Models\Maquina;
use App\Models\MaquinasSalida;
use App\Models\Dia;
use App\Models\Minuto;
use App\Models\Hora;

new class extends Component
{
    public $open_edit = false;
    public $open_salida = false;
    public $open_edit_maquina = false;
    public $lista_dias=[], $hora_reloj, $minuto_reloj, $dia_id, $hora_ton, $hora_toff, $minuto_ton, $minuto_toff, $setpoint, $lista_horas=[], $lista_minutos=[];
    public $name_maquina, $name_salida, $id_maquina, $id_salida;
    public $maquina, $salida;

    public $maquinas=[];
    public $maquinas_salidas=[];

    public function mount()
    {
        $this->lista_dias = Dia::orderBy('id', 'asc')->get();
        $this->lista_minutos = Minuto::orderBy('id', 'asc')->get();
        $this->lista_horas = Hora::orderBy('id', 'asc')->get();

        $this->maquinas = Maquina::where('usuario_id', auth()->user()->id)->orderBy('id', 'desc')->get();
        $this->maquinas_salidas = MaquinasSalida::orderBy('maquina_id', 'asc')->get();
        json_decode($this->maquinas);
        json_decode($this->maquinas_salidas);
    }

    #[On('echo-private:messages,MessageSent')]
    public function onMessageSent($event)
    {
        $this->maquinas = Maquina::where('usuario_id', auth()->user()->id)->orderBy('id', 'desc')->get();
        $this->maquinas_salidas = MaquinasSalida::orderBy('maquina_id', 'asc')->get();
        json_decode($this->maquinas);
        json_decode($this->maquinas_salidas);
    }

    public function edit($maquina, $salida)
    {
        $this->maquina = $maquina;
        $this->salida = $salida;

        $this->open_edit = true;
    }

    public function edit_name_salida(MaquinasSalida $salida_editar)
    {
        $this->id_salida = $salida_editar['id'];
        $this->name_salida = $salida_editar['nombre'];

        $this->open_salida = true;
    }

    public function edit_name_maquina(Maquina $maquina_editar)
    {
        $this->id_maquina = $maquina_editar['id'];
        $this->name_maquina = $maquina_editar['nombre'];

        $this->open_edit_maquina = true;
    }

    public function update_maquina()
    {
        $this->validate([
            'name_maquina' => 'required|max:20',
        ]);

        $actualizar = Maquina::where('id', $this->id_maquina)
        ->update([
            'nombre' => $this->name_maquina,
        ]);

//        MessageSent::dispatch();

        $this->reset(['open_edit_maquina','name_maquina']);
        $this->dispatch('alert');
    }

    public function update_salida()
    {
        $this->validate([
            'name_salida' => 'required|max:20',
        ]);

        $actualizar = MaquinasSalida::where('id', $this->id_salida)
        ->update([
            'nombre' => $this->name_salida,
        ]);

//        MessageSent::dispatch();

        $this->reset(['open_salida','name_maquina']);
        $this->dispatch('alert');
    }

    public function update_device()
    {
        $this->validate([
            'hora_reloj' => 'required|max:5',
            'minuto_reloj' => 'required|max:5',
            'dia_id' => 'required|max:5',
        ]);

        $actualizar = Maquina::where('id', $this->maquina)
        ->update([
            'estatus_device' => 1,
            'dia_solicitado' => $this->dia_id,
            'reloj_solicitado' => $this->hora_reloj.":".$this->minuto_reloj,
        ]);

 //       MessageSent::dispatch();

        $this->reset(['open_edit','hora_reloj','minuto_reloj','dia_id','setpoint','hora_ton','minuto_ton','hora_toff','minuto_toff']);
        $this->dispatch('alert');
    }
    public function update_turn()
    {
        $this->validate([
            'hora_ton' => 'required|max:5',
            'minuto_ton' => 'required|max:5',
            'hora_toff' => 'required|max:5',
            'minuto_toff' => 'required|max:5',
        ]);

 //       MessageSent::dispatch();

        $actualizar = MaquinasSalida::where('maquina_id', $this->maquina)
        ->where('salida', $this->salida)
        ->update([
            'estatus_turn' => 1,
            'turnon_solicitado' => $this->hora_ton.":".$this->minuto_ton,
            'turnoff_solicitado' => $this->hora_toff.":".$this->minuto_toff,
        ]);

        $this->reset(['open_edit','hora_reloj','minuto_reloj','dia_id','setpoint','hora_ton','minuto_ton','hora_toff','minuto_toff']);
        $this->dispatch('alert');
    }
    public function update_point()
    {
        $this->validate([
            'setpoint' => 'required|min:1|max:200.9|numeric',
        ]);

        $valor = number_format($this->setpoint,2) * 10;
        $valor = number_format($valor,0, '.', '');
        $set = dechex($valor);

        //    MessageSent::dispatch();

        $actualizar = MaquinasSalida::where('maquina_id', $this->maquina)
        ->where('salida', $this->salida)
        ->update([
            'estatus_point' => 1,
            'setpoint_solicitado' => $set,
        ]);

        $this->reset(['open_edit','hora_reloj','minuto_reloj','dia_id','setpoint','hora_ton','minuto_ton','hora_toff','minuto_toff']);
        $this->dispatch('alert');
    }
}
?>
<div class="container" wire:poll>
    <span class="text-2xl font-semi-bold leading-normal">{{ __('Dashboard') }}</span>
    <div class="col-12" style="overflow-x: auto">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 my-4 p-2 rounded">
            @foreach($maquinas as $maq)
                <div class="w-full">
                    <div class="relative w-full px-4 py-6 bg-white shadow-lg dark:bg-gray-700 rounded">
			            <span style="font-size:0.7em">{{ "CHORIZO ".$maq->chorizo }}</span>
                            <!-- SOLICITUDES PENDIENTES DE CAMBIO DE PARAMETROS MAQUINAS -->
                            @if($maq->estatus_device == 1)
                                <div class="bg-yellow-200 dark:bg-gray-800 mt-4 mb-6">
                                    <div class="px-3 py-3 mx-auto max-w-7xl sm:px-6 lg:px-8">
                                        <div class="flex flex-wrap items-center justify-between">
                                            <div class="flex items-center flex-1 w-0">
                                                <span class="flex p-2 rounded-lg dark:bg-black fondo-naranja">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="w-6 h-6 text-white" viewBox="0 0 1792 1792">
                                                        <path d="M1024 1375v-190q0-14-9.5-23.5t-22.5-9.5h-192q-13 0-22.5 9.5t-9.5 23.5v190q0 14 9.5 23.5t22.5 9.5h192q13 0 22.5-9.5t9.5-23.5zm-2-374l18-459q0-12-10-19-13-11-24-11h-220q-11 0-24 11-10 7-10 21l17 457q0 10 10 16.5t24 6.5h185q14 0 23.5-6.5t10.5-16.5zm-14-934l768 1408q35 63-2 126-17 29-46.5 46t-63.5 17h-1536q-34 0-63.5-17t-46.5-46q-37-63-2-126l768-1408q17-31 47-49t65-18 65 18 47 49z">
                                                        </path>
                                                    </svg>
                                                </span>
                                                <p class="ml-3 font-medium">
                                                    <span class="md:inline texto-primary">
                                                        {{ __('Device waiting for update.') }}
                                                    </span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>                                    
                            @endif
                        <!-- FIN DE CAMBIO DE PARAMETROS -->
                        <div class="mb-4">
                            <div class="flex items-center justify-between mb-2">
                                <div class="flex items-center">
                                    <span class="relative p-2 fondo-primero rounded-xl">

                                    </span>
                                    <div class="flex flex-col">
                                        <span class="ml-2 font-bold texto-primero text-md dark:text-white">
                                            {{ $maq->nombre }}
                                            <span class="ml-2 text-xs text-gray-500 dark:text-white">
                                                ({{ "ID ".$maq->id_maquina }})
                                            </span>
                                        </span>
                                        <span class="ml-2 text-sm text-gray-500 dark:text-white">
                                            @if($maq->dia_id <> '')
                                                {{ $maq->reloj." - ".$maq->maquina_dia->dias }}
                                            @else
                                                {{ $maq->reloj }}
                                            @endif
                                        </span>
                                    </div>
                                </div>
                                <div class="flex items-center">
                                    <button class="p-1 mr-0 text-sm text-gray-400">
                                        <a wire:click="edit_name_maquina({{ $maq }})" class="cursor-pointer" title="{{ __('Name machine edit') }}"><i class="icofont icofont-edit-alt texto-azul" style="font-size: 1em"></i></a>
                                    </button>
                                </div>
                            </div>
                            @foreach($maquinas_salidas as $sal)
                                @if($sal->maquina_id == $maq->id)
                                    <!-- SOLICITUDES PENDIENTES DE CAMBIO DE PARAMETROS SALIDAS -->
                                    @if($sal->estatus_turn == 1)
                                        <div class="w-full bg-yellow-200 dark:bg-gray-800 mt-4 mb-6">
                                            <div class="px-3 py-3 mx-auto max-w-7xl sm:px-6 lg:px-8">
                                                <div class="flex flex-wrap items-center justify-between">
                                                    <div class="flex items-center flex-1 w-0">
                                                        <span class="flex p-2 rounded-lg dark:bg-black fondo-naranja">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="w-6 h-6 text-white" viewBox="0 0 1792 1792">
                                                                <path d="M1024 1375v-190q0-14-9.5-23.5t-22.5-9.5h-192q-13 0-22.5 9.5t-9.5 23.5v190q0 14 9.5 23.5t22.5 9.5h192q13 0 22.5-9.5t9.5-23.5zm-2-374l18-459q0-12-10-19-13-11-24-11h-220q-11 0-24 11-10 7-10 21l17 457q0 10 10 16.5t24 6.5h185q14 0 23.5-6.5t10.5-16.5zm-14-934l768 1408q35 63-2 126-17 29-46.5 46t-63.5 17h-1536q-34 0-63.5-17t-46.5-46q-37-63-2-126l768-1408q17-31 47-49t65-18 65 18 47 49z">
                                                                </path>
                                                            </svg>
                                                        </span>
                                                        <p class="ml-3 font-medium">
                                                            <span class="md:inline texto-primary">
                                                                {{ __('Turn waiting for update') }}
                                                            </span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if($sal->estatus_point == 1)
                                        <div class="w-full bg-yellow-200 dark:bg-gray-800 mt-4 mb-6">
                                            <div class="px-3 py-3 mx-auto max-w-7xl sm:px-6 lg:px-8">
                                                <div class="flex flex-wrap items-center justify-between">
                                                    <div class="flex items-center flex-1 w-0">
                                                        <span class="flex p-2 rounded-lg dark:bg-black fondo-naranja">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="w-6 h-6 text-white" viewBox="0 0 1792 1792">
                                                                <path d="M1024 1375v-190q0-14-9.5-23.5t-22.5-9.5h-192q-13 0-22.5 9.5t-9.5 23.5v190q0 14 9.5 23.5t22.5 9.5h192q13 0 22.5-9.5t9.5-23.5zm-2-374l18-459q0-12-10-19-13-11-24-11h-220q-11 0-24 11-10 7-10 21l17 457q0 10 10 16.5t24 6.5h185q14 0 23.5-6.5t10.5-16.5zm-14-934l768 1408q35 63-2 126-17 29-46.5 46t-63.5 17h-1536q-34 0-63.5-17t-46.5-46q-37-63-2-126l768-1408q17-31 47-49t65-18 65 18 47 49z">
                                                                </path>
                                                            </svg>
                                                        </span>
                                                        <p class="ml-3 font-medium">
                                                            <span class="md:inline texto-primary">
                                                                {{ __('Set Point waiting for update') }}
                                                            </span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    <!-- FIN DE CAMBIO DE PARAMETROS -->

                                    <div class="flex items-center justify-between ">
                                        <p class="font-bold texto-primero text-md dark:text-white">
                                            {{ $sal->nombre }}
                                            @if($maq->estatus_maquina_id == 0 )
                                                <span class="badge p-0.5 pl-1 pr-1 rounded" style="background-color: #f9e79f; color: #9a7d0a; font-size:0.6em; margin-top:0px">
                                                    {{ __('Disable') }}
                                                </span>
                                            @else
                                                <span class="badge p-0.5 pl-1 pr-1 rounded" style="background-color: #a9dfbf; color: #186a3b; font-size:0.6em; margin-top:0px">
                                                    {{ __('Enabled') }}
                                                </span>
                                            @endif

                                            @if($maq->estatus_estado_id == 1 or $maq->estatus_estado_id == 2 or $maq->estatus_estado_id == 4 )
                                                <span class="ml-1 badge p-0.5 pl-1 pr-1 rounded" style="background-color: #a9dfbf; color: #186a3b; font-size:0.6em; margin-top:5px">
                                                    {{ __('ON') }}
                                                </span>
                                            @else
                                                <span class="ml-1 badge p-0.5 pl-1 pr-1 rounded" style="background-color: #f9e79f; color: #9a7d0a; font-size:0.6em; margin-top:5px">
                                                    {{ __('OFF') }}
                                                </span>
                                            @endif
                                        </p>
                                        <button class="p-1 mr-0 text-sm text-gray-400">
                                            <a wire:click="edit({{ $maq->id }}, {{ $sal->salida }})" class="cursor-pointer" style="margin-left:5px; font-size:1.2em"><i class="icofont icofont-gear texto-azul"></i></a>
                                            
                                            <a wire:click="edit_name_salida({{ $sal }})" title="{{ __('Name output edit') }}" class="cursor-pointer" style="margin-left:5px; font-size:1em"><i class="icofont icofont-edit-alt texto-azul"></i></a>
                                        </button>
                                    </div>
                                    <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-0 p-0 rounded">
                                        <span class="ml-0 text-xs text-gray-500 dark:text-white">
                                            {{ __('Last update') }} {{ ": ".date("d/m/Y H:i:s",strtotime($sal->updated_at)) }}
                                        </span>
                                    </div>
                                    @php $letra = ""@endphp
                                    @if($sal->uno == 69)
                                        @php
                                        $resultado = 0;
                                        $letra = 69;
                                        @endphp
                                    @else
                                        @if($sal->uno == 86)
                                            @php
                                            $letra="V";
                                            @endphp
                                        @else
                                            @php
                                                $letra = $sal->uno                                                
                                            @endphp
                                        @endif
                                        @php
                                        $resultado = (($sal->tres * 256) + $sal->cuatro) / 10;
                                        @endphp
                                    @endif
            
                                    @if($sal->estatus_estado_id == 0 or $sal->estatus_estado_id == 3)
                                        @php
                                        $tem = "- °C";
                                        $set = "- °C";
                                        @endphp
                                    @else
                                        @if($sal->point == "")
                                            @php
                                            $tem = "- °C";
                                            $set = "- °C";
                                            @endphp
                                        @else
                                            @if($sal->dos == 254 or $sal->dos == 255)
                                                @php
                                                $tem = "- °C";
                                                $set = "- °C";
                                                @endphp
                                            @else
                                                @php
                                                $tem = $resultado." °C";
                                                $set = $sal->point." °C";
                                                @endphp
                                            @endif
                                        @endif
                                    @endif
            
                                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-2 p-2 rounded">
                                        <div class="flex-1 w-full text-center p-2 border-2 border-gray-100 rounded text-white fondo-primero">
                                            <div class="flex items-center text-xs dark:text-white text-center">
                                                <i class="icofont icofont-stopwatch mr-2" style="font-size:1.7em"></i>
                                                {{ __('Turn On') }}
                                            </div>
                                            <div class="text-sm text-yellow-400 font-bold dark:text-gray-200">
                                                {{ $sal->hora_encendido }}
                                            </div>
                                        </div>
                                        <div class="flex-1 w-full text-center p-2 border-2 border-gray-100 rounded text-white fondo-primero">
                                            <div class="flex items-center text-xs dark:text-white text-center">
                                                <i class="icofont icofont-stopwatch mr-2" style="font-size:1.7em"></i>
                                                {{ __('Turn Off') }}
                                            </div>
                                            <div class="text-sm text-yellow-400 font-bold dark:text-gray-200">
                                                {{ $sal->hora_apagado }}
                                            </div>
                                        </div>
                                        <div class="flex-1 w-full text-center p-2 border-2 border-gray-100 rounded text-white fondo-primero">
                                            <div class="flex items-center text-xs dark:text-white text-center">
                                                <i class="icofont icofont-snow-temp mr-2" style="font-size:1.7em"></i>
                                                {{ __('Temperature') }}
                                            </div>
                                            <div class="text-sm text-yellow-400 font-bold dark:text-gray-200">
                                                {{ $tem }}
                                            </div>
                                        </div>
                                        <div class="flex-1 w-full text-center p-2 border-2 border-gray-100 rounded text-white fondo-primero">
                                            <div class="flex items-center text-xs dark:text-white text-center">
                                                <i class="icofont icofont-thermometer mr-2" style="font-size:1.7em"></i>
                                                {{ __('Set Point') }}
                                            </div>
                                            <div class="text-sm text-yellow-400 font-bold dark:text-gray-200">
                                                {{ $set }}
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div id="zona1"></div>

    </div>
    <x-dialog-modal wire:model="open_edit">
        <x-slot name="title">
            {{ __('Output Machine') }}
        </x-slot>
        <x-slot name="content">
            <h2 class="w-full mx-auto">
                {{ __('Device') }}
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 my-0 p-2 rounded">
                <div class="mb-2">
                    <x-label value="{{ __('Hour Clock') }}" />
                    <select class="w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-300 rounded-md border border-primary pl-2 pr-2 py-2.5 focus:outline-none sm:text-sm" wire:model="hora_reloj">
                        <option value="">Select...</option>
                        @foreach ($lista_horas as $hora)
                            <option value="{{ $hora->id_hora }}">{{ $hora->horas }}</option>
                        @endforeach
                    </select>
                    <x-input-error for="hora_reloj" />
                </div>
                <div class="mb-2">
                    <x-label value="{{ __('Minutes Clock') }}" />
                    <select class="w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-300 rounded-md border border-primary pl-2 pr-2 py-2.5 focus:outline-none sm:text-sm" wire:model="minuto_reloj">
                        <option value="">Select...</option>
                        @foreach ($lista_minutos as $minuto)
                            <option value="{{ $minuto->id_minuto }}">{{ $minuto->minutos }}</option>
                        @endforeach
                    </select>
                    <x-input-error for="minuto_reloj" />
                </div>
                <div class="mb-2">
                    <x-label value="{{ __('Week Day') }}" />
                    <select class="w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-300 rounded-md border border-primary pl-2 pr-2 py-2.5 focus:outline-none sm:text-sm" wire:model="dia_id">
                        <option value="">Select...</option>
                        @foreach ($lista_dias as $dia)
                            <option value="{{ $dia->id }}">{{ $dia->dias }}</option>
                        @endforeach
                    </select>
                    <x-input-error for="dia_id" />
                </div>
            </div>
            <x-boton-primario wire:click="update_device" wire:loading.attr="disabled" class="disabled:opacity-25 ml-2 mb-4">
                {{ __('Send Device Data ') }}
            </x-boton-primario>
            <hr/>
            <h2 class="w-full mx-auto mt-4">
                {{ __('Output') }}
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 my-0 p-2 rounded">
                <div class="mb-2">
                    <x-label value="{{ __('Hour Turn On') }}" />
                    <select class="w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-300 rounded-md border border-primary pl-2 pr-2 py-2.5 focus:outline-none sm:text-sm" wire:model="hora_ton">
                        <option value="">Select...</option>
                        @foreach ($lista_horas as $hora)
                            <option value="{{ $hora->id_hora }}">{{ $hora->horas }}</option>
                        @endforeach
                    </select>
                    <x-input-error for="hora_ton" />
                </div>
                <div class="mb-2">
                    <x-label value="{{ __('Minutes Turn On') }}" />
                    <select class="w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-300 rounded-md border border-primary pl-2 pr-2 py-2.5 focus:outline-none sm:text-sm" wire:model="minuto_ton">
                        <option value="">Select...</option>
                        @foreach ($lista_minutos as $minuto)
                            <option value="{{ $minuto->id_minuto }}">{{ $minuto->minutos }}</option>
                        @endforeach
                    </select>
                    <x-input-error for="minuto_ton" />
                </div>
                <div class="mb-2">
                    <x-label value="{{ __('Hour Turn Off') }}" />
                    <select class="w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-300 rounded-md border border-primary pl-2 pr-2 py-2.5 focus:outline-none sm:text-sm" wire:model="hora_toff">
                        <option value="">Select...</option>
                        @foreach ($lista_horas as $hora)
                            <option value="{{ $hora->id_hora }}">{{ $hora->horas }}</option>
                        @endforeach
                    </select>
                    <x-input-error for="hora_toff" />
                </div>
                <div class="mb-2">
                    <x-label value="{{ __('Minutes Turn Off') }}" />
                    <select class="w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-300 rounded-md border border-primary pl-2 pr-2 py-2.5 focus:outline-none sm:text-sm" wire:model="minuto_toff">
                        <option value="">Select...</option>
                        @foreach ($lista_minutos as $minuto)
                            <option value="{{ $minuto->id_minuto }}">{{ $minuto->minutos }}</option>
                        @endforeach
                    </select>
                    <x-input-error for="minuto_toff" />
                </div>
            </div>
            <x-boton-primario wire:click="update_turn" wire:loading.attr="disabled" class="disabled:opacity-25 ml-2 mb-4">
                {{ __('Send Output Data') }}
            </x-boton-primario>
            <hr/>
            <h2 class="w-full mx-auto mt-4">
                {{ __('Set Point') }}
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-4 my-0 p-2 rounded">
                <div class="mb-4">
                    <x-label value="{{ __('Value') }}" />
                    <x-input wire:model.defer="setpoint" type="text" class="w-full" />
                    <x-input-error for="setpoint"/>
                </div>
            </div>
            <x-boton-primario wire:click="update_point" wire:loading.attr="disabled" class="disabled:opacity-25 ml-2 mb-4">
                {{ __('Send Set Point Value') }}
            </x-boton-primario>
        </x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click="$set('open_edit', false)">
                {{ __('Cancel') }}
            </x-secondary-button>
        </x-slot>
    </x-dialog-modal>
    <x-dialog-modal wire:model="open_salida">
        <x-slot name="title">
            {{ __('Output') }}
        </x-slot>
        <x-slot name="content">
            <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-4 my-0 p-2 rounded">
                <div class="mb-4">
                    <x-label value="{{ __('Output Name') }}" />
                    <x-input wire:model.defer="name_salida" type="text" class="w-full" />
                    <x-input-error for="name_salida"/>
                </div>
        </x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click="$set('open_salida', false)">
                {{ __('Cancel') }}
            </x-secondary-button>
            <x-boton-primario wire:click="update_salida" wire:loading.attr="disabled" class="disabled:opacity-25 ml-2">
                {{ __('Update') }}
            </x-boton-primario>
        </x-slot>
    </x-dialog-modal>
</div>
<x-dialog-modal wire:model="open_edit_maquina">
    <x-slot name="title">
        {{ __('Machine') }}
    </x-slot>
    <x-slot name="content">
        <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-4 my-0 p-2 rounded">
            <div class="mb-4">
                <x-label value="{{ __('Machine Name') }}" />
                <x-input wire:model.defer="name_maquina" type="text" class="w-full" />
                <x-input-error for="name_maquina"/>
            </div>
    </x-slot>
    <x-slot name="footer">
        <x-secondary-button wire:click="$set('open_edit_maquina', false)">
            {{ __('Cancel') }}
        </x-secondary-button>
        <x-boton-primario wire:click="update_maquina" wire:loading.attr="disabled" class="disabled:opacity-25 ml-2">
            {{ __('Update') }}
        </x-boton-primario>
    </x-slot>
</x-dialog-modal>

<script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

<script>
    //setInterval("location.reload()", 10000);
    /*
    setInterval(function()
    {
        $.ajax
        ({
            url:"actualizar-user",
            method: "GET",
            success: function(data)
            {
                $("#zona1").html(data)
            }
        });
    },5000);
*/
</script>
