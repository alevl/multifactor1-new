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
    public $open_parametros = false;
    public $open_edit_maquina = false;
    public $lista_dias=[], $hora_reloj, $minuto_reloj, $dia_id, $hora_ton, $hora_toff, $minuto_ton, $minuto_toff, $setpoint, $setpoint2, $lista_horas=[], $lista_minutos=[];
    public $name_maquina, $name_salida, $id_maquina, $id_salida;
    public $maquina, $salida, $temperatura, $humedad, $id_maquina_parametro, $id_id_maquina_parametro;
    public $signo_calibrar, $entero_calibrar, $decimal_calibrar, $frecuencia_deshielo, $duracion_deshielo;

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

    public function edit_parametros(Maquina $maq)
    {
        $this->id_maquina_parametro = $maq->id;
        $this->id_id_maquina_parametro = $maq->id_maquina;

        $this->open_parametros = true;
    }

    public function edit_name_maquina(Maquina $maquina_editar)
    {
        $this->id_maquina = $maquina_editar['id'];
        $this->name_maquina = $maquina_editar['nombre'];

        $this->open_edit_maquina = true;
    }

    public function update_maquina(){
        $this->validate([
            'name_maquina' => 'required|max:20',
        ]);

        $actualizar = Maquina::where('id', $this->id_maquina)
        ->update([
            'nombre' => $this->name_maquina,
        ]);

        //    //    MessageSent::dispatch();

        $this->reset(['open_edit_maquina','name_maquina']);
        $this->dispatch('alert');
    }

    public function update_device(){
        $this->validate([
            'hora_reloj' => 'required|max:5',
            'minuto_reloj' => 'required|max:5',
            'dia_id' => 'required|max:5',
        ]);

        $actualizar = Maquina::where('id', $this->id_maquina_parametro)
        ->update([
            'estatus_device' => 1,
            'dia_solicitado' => $this->dia_id,
            'reloj_solicitado' => $this->hora_reloj.":".$this->minuto_reloj,
        ]);

        //    //    MessageSent::dispatch();

        $this->reset(['open_parametros','frecuencia_deshielo','duracion_deshielo','signo_calibrar','entero_calibrar','decimal_calibrar','hora_reloj','minuto_reloj','dia_id','setpoint','setpoint2','hora_ton','minuto_ton','hora_toff','minuto_toff']);
        $this->dispatch('alert');
    }
    public function update_point(){
        $this->validate([
            'setpoint' => 'required|min:-4|max:60|numeric',
            'setpoint2' => 'required|min:-4|max:60|numeric',
        ]);

        $point1 = $this->setpoint;
        $point2 = $this->setpoint2;

        $parte_dos_1 = 0;
        $parte_dos_2 = 0;
        
        if($point1 < 0)
        {
            $point1 = $point1 * 10;
            $point1 = $point1 * (-1);
            $cociente = intdiv($point1, 100);
            $resto = ($point1 % 100);
            $cociente = $cociente + 128;
            $parte_uno_1 = dechex($cociente);
            $parte_uno_2 = $resto;
        } 
        else
        {
            $point1 = $point1 * 10;
            $cociente = intdiv($point1, 100);
            $resto = ($point1 % 100);
            $parte_uno_1 = dechex($cociente);
            $parte_uno_2 = $resto;
        }
                
        if($point2 < 0)
        {
            $point2 = $point2 * 10;
            $point2 = $point2 * (-1);
            $cociente = intdiv($point2, 100);
            $resto = ($point2 % 100);
            $cociente = $cociente + 128;
            $parte_dos_1 = dechex($cociente);
            $parte_dos_2 = $resto;
        } 
        else
        {
            $point2 = $point2 * 10;
            $cociente = intdiv($point2, 100);
            $resto = ($point2 % 100);
            $parte_dos_1 = dechex($cociente);
            $parte_dos_2 = $resto;
        }

        $actualizar = MaquinasSalida::where('maquina_id', $this->id_maquina_parametro)
        ->where('salida', 1)
        ->update([
            'set_point1_entero' => $parte_uno_1,
            'set_point1_decimal' => $parte_uno_2,
            'set_point2_entero' => $parte_dos_1,
            'set_point2_decimal' => $parte_dos_2,
            'estatus_point' => 1,
        ]);

        //    //    MessageSent::dispatch();

        $this->reset(['open_parametros','frecuencia_deshielo','duracion_deshielo','signo_calibrar','entero_calibrar','decimal_calibrar','hora_reloj','minuto_reloj','dia_id','setpoint','setpoint2','hora_ton','minuto_ton','hora_toff','minuto_toff']);
        $this->dispatch('alert');
    }
    public function update_calibrar(){
        $this->validate([
            'signo_calibrar' => 'required',
            'entero_calibrar' => 'required',
            'decimal_calibrar' => 'required',
        ]);

        $signo = dechex($this->signo_calibrar);
        $entero = dechex($this->entero_calibrar);
        $punto = dechex(46);
        $decimal = dechex($this->decimal_calibrar);

        $actualizar = Maquina::where('id', $this->id_maquina_parametro)
        ->update([
            'signo_ajuste' => $signo,
            'entero_ajuste' => $entero,
            'punto_ajuste' => $punto,
            'decimal_ajuste' => $decimal,
            'estatus_ajuste' => 1,
        ]);

        //    MessageSent::dispatch();

        $this->reset(['open_parametros','frecuencia_deshielo','duracion_deshielo','signo_calibrar','entero_calibrar','decimal_calibrar','hora_reloj','minuto_reloj','dia_id','setpoint','setpoint2','hora_ton','minuto_ton','hora_toff','minuto_toff']);
        $this->dispatch('alert');
    }
    public function update_deshielo(){
        $this->validate([
            'frecuencia_deshielo' => 'required',
            'duracion_deshielo' => 'required',
        ]);

        $mostrar_frecuencia = $this->frecuencia_deshielo;
        $mostrar_duracion = $this->duracion_deshielo;
        $frecuencia = dechex($this->frecuencia_deshielo);
        $duracion = dechex($this->duracion_deshielo);

        $actualizar = MaquinasSalida::where('maquina_id', $this->id_maquina_parametro)
        ->where('salida', 2)
        ->update([
            'frecuencia_solicitado' => $frecuencia,
            'duracion_solicitado' => $duracion,
            'mostrar_frecuencia' => $mostrar_frecuencia,
            'mostrar_duracion' => $mostrar_duracion,
            'estatus_frecuencia' => 1,
        ]);

        //    MessageSent::dispatch();

        $this->reset(['open_parametros','frecuencia_deshielo','duracion_deshielo','signo_calibrar','entero_calibrar','decimal_calibrar','hora_reloj','minuto_reloj','dia_id','setpoint','setpoint2','hora_ton','minuto_ton','hora_toff','minuto_toff']);
        $this->dispatch('alert');
    }
    public function update_deshielo_disabled()
    {
        $actualizar = MaquinasSalida::where('maquina_id', $this->id_maquina_parametro)
        ->where('salida', 2)
        ->update([
            'frecuencia_solicitado' => 0,
            'duracion_solicitado' => 0,
            'estatus_frecuencia' => 1,
        ]);

        //    MessageSent::dispatch();

        $this->reset(['open_parametros','frecuencia_deshielo','duracion_deshielo','signo_calibrar','entero_calibrar','decimal_calibrar','hora_reloj','minuto_reloj','dia_id','setpoint','setpoint2','hora_ton','minuto_ton','hora_toff','minuto_toff']);
        $this->dispatch('alert');
    }
    public function update_sistema($maquina)
    {
        $actualizar = Maquina::where('id', $maquina)
        ->update([
            'estatus_sistema' => 1,
        ]);

        //    MessageSent::dispatch();

        $this->dispatch('alert');
    }
    public function update_salida3($maquina)
    {
        $actualizar = MaquinasSalida::where('maquina_id', $maquina)
        ->where('salida', 3)
        ->update([
            'estatus_salida_manual' => 1,
        ]);

        //    MessageSent::dispatch();

        $this->dispatch('alert');
    }
}
?>
<div class="container" wirw:poll>
    <span class="text-2xl font-semi-bold leading-normal">{{ __('Dashboard') }}</span>
    <div class="col-12" style="overflow-x: auto">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 my-4 p-2 rounded">
            @foreach($maquinas as $maq)
                <div class="w-full">
                    <div class="relative w-full px-4 py-6 bg-white shadow-lg dark:bg-gray-700 rounded">
                        <!-- SOLICITUDES PENDIENTES DE CAMBIO DE PARAMETROS MAQUINAS -->
                        @if($maq->estatus_device == 1)
                            <div class="bg-yellow-200 dark:bg-gray-800 mt-4 mb-6">
                                <div class="px-3 py-3 mx-auto max-w-7xl sm:px-6 lg:px-8">
                                    <div class="flex flex-wrap items-center justify-between">
                                        <div class="flex items-center flex-1 w-0">
                                            <span class="flex p-2 rounded-lg dark:bg-black fondo-rojo">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="w-6 h-6 text-white" viewBox="0 0 1792 1792">
                                                    <path d="M1024 1375v-190q0-14-9.5-23.5t-22.5-9.5h-192q-13 0-22.5 9.5t-9.5 23.5v190q0 14 9.5 23.5t22.5 9.5h192q13 0 22.5-9.5t9.5-23.5zm-2-374l18-459q0-12-10-19-13-11-24-11h-220q-11 0-24 11-10 7-10 21l17 457q0 10 10 16.5t24 6.5h185q14 0 23.5-6.5t10.5-16.5zm-14-934l768 1408q35 63-2 126-17 29-46.5 46t-63.5 17h-1536q-34 0-63.5-17t-46.5-46q-37-63-2-126l768-1408q17-31 47-49t65-18 65 18 47 49z">
                                                    </path>
                                                </svg>
                                            </span>
                                            <p class="ml-3 font-medium">
                                                <span class="md:inline texto-primary">
                                                    {{ __('Waiting for device date update.') }}
                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if($maq->estatus_ajuste == 1)
                            <div class="bg-yellow-200 dark:bg-gray-800 mt-4 mb-6">
                                <div class="px-3 py-3 mx-auto max-w-7xl sm:px-6 lg:px-8">
                                    <div class="flex flex-wrap items-center justify-between">
                                        <div class="flex items-center flex-1 w-0">
                                            <span class="flex p-2 rounded-lg dark:bg-black fondo-rojo">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="w-6 h-6 text-white" viewBox="0 0 1792 1792">
                                                    <path d="M1024 1375v-190q0-14-9.5-23.5t-22.5-9.5h-192q-13 0-22.5 9.5t-9.5 23.5v190q0 14 9.5 23.5t22.5 9.5h192q13 0 22.5-9.5t9.5-23.5zm-2-374l18-459q0-12-10-19-13-11-24-11h-220q-11 0-24 11-10 7-10 21l17 457q0 10 10 16.5t24 6.5h185q14 0 23.5-6.5t10.5-16.5zm-14-934l768 1408q35 63-2 126-17 29-46.5 46t-63.5 17h-1536q-34 0-63.5-17t-46.5-46q-37-63-2-126l768-1408q17-31 47-49t65-18 65 18 47 49z">
                                                    </path>
                                                </svg>
                                            </span>
                                            <p class="ml-3 font-medium">
                                                <span class="md:inline texto-primary">
                                                    {{ __('Waiting for temperature update.') }}
                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if($maq->estatus_frecuencia == 1)
                            <div class="bg-yellow-200 dark:bg-gray-800 mt-4 mb-6">
                                <div class="px-3 py-3 mx-auto max-w-7xl sm:px-6 lg:px-8">
                                    <div class="flex flex-wrap items-center justify-between">
                                        <div class="flex items-center flex-1 w-0">
                                            <span class="flex p-2 rounded-lg dark:bg-black fondo-rojo">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="w-6 h-6 text-white" viewBox="0 0 1792 1792">
                                                    <path d="M1024 1375v-190q0-14-9.5-23.5t-22.5-9.5h-192q-13 0-22.5 9.5t-9.5 23.5v190q0 14 9.5 23.5t22.5 9.5h192q13 0 22.5-9.5t9.5-23.5zm-2-374l18-459q0-12-10-19-13-11-24-11h-220q-11 0-24 11-10 7-10 21l17 457q0 10 10 16.5t24 6.5h185q14 0 23.5-6.5t10.5-16.5zm-14-934l768 1408q35 63-2 126-17 29-46.5 46t-63.5 17h-1536q-34 0-63.5-17t-46.5-46q-37-63-2-126l768-1408q17-31 47-49t65-18 65 18 47 49z">
                                                    </path>
                                                </svg>
                                            </span>
                                            <p class="ml-3 font-medium">
                                                <span class="md:inline texto-primary">
                                                    {{ __('Waiting for defrost update.') }}
                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <!-- FIN DE CAMBIO DE PARAMETROS -->
                        <!--ALERTAS DEL SISTEMA-->
                        @if($maq->estatus_estado_id == 0)
                            <div class="bg-yellow-200 dark:bg-gray-800 mt-0 mb-6">
                                <div class="px-3 py-3 mx-auto max-w-7xl sm:px-6 lg:px-8">
                                    <div class="flex flex-wrap items-center justify-between">
                                        <div class="flex items-center flex-1 w-0">
                                            <span class="flex p-2 rounded-lg dark:bg-black fondo-rojo">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="w-6 h-6 text-white" viewBox="0 0 1792 1792">
                                                    <path d="M1024 1375v-190q0-14-9.5-23.5t-22.5-9.5h-192q-13 0-22.5 9.5t-9.5 23.5v190q0 14 9.5 23.5t22.5 9.5h192q13 0 22.5-9.5t9.5-23.5zm-2-374l18-459q0-12-10-19-13-11-24-11h-220q-11 0-24 11-10 7-10 21l17 457q0 10 10 16.5t24 6.5h185q14 0 23.5-6.5t10.5-16.5zm-14-934l768 1408q35 63-2 126-17 29-46.5 46t-63.5 17h-1536q-34 0-63.5-17t-46.5-46q-37-63-2-126l768-1408q17-31 47-49t65-18 65 18 47 49z">
                                                    </path>
                                                </svg>
                                            </span>
                                            <p class="ml-3 font-medium">
                                                <span class="md:inline texto-primary">
                                                    {{ __('System Disabled; Only manual output works.') }}
                                                </span>
                                            </p>
                                            <div class="px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6 fondo-primary">
                                                <a wire:click="$dispatch('sistema1', {{ $maq->id }})" class="cursor-pointer inline-flex w-full justify-center rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto" style="margin:auto">Habilitar</a>
                                            </div>            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <!--FIN ALERTAS DEL SISTEMA-->
                        <div class="mb-4">
                            <div class="flex items-center justify-between mb-2">
                                <div class="flex items-center">
                                    <div class="flex flex-col">
                                        <span class="ml-2 font-bold texto-primero text-md dark:text-white">
                                            {{ $maq->nombre }}
                                            <span class="ml-2 text-xs text-gray-500 dark:text-white">
                                                ({{ "ID ".$maq->id_maquina }})
                                            </span>
                                        </span>
                                        @if($maq->estatus_estado_id <> 0)
                                            <span class="text-sm text-gray-500 dark:text-white">
                                                <span class="flex items-center px-2 py-1 text-xs font-semibold text-green-600 ">
                                                    Sistema Habilitado
                                                        <span class="ml-2">
                                                            <a wire:click="$dispatch('sistema2', {{ $maq->id }})" class="cursor-pointer p-1 rounded" style="color: #e74c3c;background-color: #fadbd8; font-size:0.8em">Deshabilitar</a>
                                                        </span>
                                                    </a>
                                                </span>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="flex items-center">
                                    <button class="p-1 mr-0 text-sm text-gray-400">
                                        <a wire:click="edit_parametros({{ $maq }})" class="cursor-pointer" title="Name nachine edit"><i class="icofont icofont-gear texto-azul" style="font-size: 1em"></i></a>
                                    </button>
                                    <button class="p-1 mr-0 text-sm text-gray-400">
                                        <a wire:click="edit_name_maquina({{ $maq }})" class="cursor-pointer" title="{{ __('Name nachine edit') }}"><i class="icofont icofont-edit-alt texto-azul" style="font-size: 1em"></i></a>
                                    </button>
                                </div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-2 p-2 rounded">
                                <div class="flex-1 w-full text-center p-2 border-2 border-gray-100 rounded text-white fondo-primero">
                                    <div class="flex items-center text-xs dark:text-white text-center">
                                        <img src="{{ asset('storage/sistema/icono-tiempo.png') }}" class="mr-1" style="width: 25px" />
                                        {{ __('Device Clock') }}
                                    </div>
                                    <div class="text-sm text-yellow-400 font-bold dark:text-gray-200">
                                        @if($maq->dia_id <> '')
                                            {{ $maq->maquina_dia->dias.", ".$maq->reloj }}
                                        @else
                                            {{ $maq->reloj }}
                                        @endif
                                    </div>
                                </div>
                                <div class="flex-1 w-full text-center p-2 border-2 border-gray-100 rounded text-white fondo-primero">
                                    <div class="flex items-center text-xs dark:text-white text-center">
                                        <img src="{{ asset('storage/sistema/icono-horario.png') }}" class="mr-1" style="width: 25px" />
                                        {{ __('Next Thaw') }}
                                    </div>
                                    <div class="text-sm text-yellow-400 font-bold dark:text-gray-200">
					@php $swn = 1; @endphp
					@foreach($maquinas_salidas as $val_sal)
						@if($val_sal->salida == 2 and $val_sal->id_maquina == $maq->id_maquina and ($val_sal->frecuencia_solicitado == 0 or $val_sal->duracion_solicitado == 0))
							@php $swn = 0; @endphp
						@endif							
					@endforeach

                                        @if($maq->deshielo == 1)
                                        	<div class="w-auto p-0"><span class="text-white inline-block py-0 px-2 text-xs font-medium rounded-full">
                                                    {{ __('Defrost OFF') }}
                                                </div>
                                        @else
					    	@if($swn == 0)
	                                            <div class="w-auto p-0"><span class="text-white inline-block py-0 px-2 text-xs font-medium rounded-full">
        	                                        {{ __('Disabled') }}
                	                            </div>
						@else
	                                            {{ $maq->deshielo }}
	                                            <div class="w-auto p-0"><span class="text-white inline-block py-0 px-2 text-xs font-medium rounded-full">
        	                                        {{ __('Defrost ON') }}
                	                            </div>
						@endif
                                        @endif
                                    </div>
                                </div>
                                <div class="flex-1 w-full text-center p-2 border-2 border-gray-100 rounded text-white fondo-primero">
                                    <div class="flex items-center text-xs dark:text-white text-center">
                                        <img src="{{ asset('storage/sistema/icono-temperatura.png') }}" class="mr-1" style="width: 27px" />
                                        {{ __('Temperature') }}
                                    </div>
                                    <div class="text-sm text-yellow-400 font-bold dark:text-gray-200">
                                        {{ $maq->temperatura." °C" }}
                                        <div class="w-auto p-0"><span class="text-white inline-block py-0 px-2 text-xs font-medium rounded-full">
                                            {{ date("d/m/Y", strtotime($maq->updated_at))." / ".date("H:i:s", strtotime($maq->updated_at)) }}
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-1 w-full text-center p-2 border-2 border-gray-100 rounded text-white fondo-primero">
                                    <div class="flex items-center text-xs dark:text-white text-center">
                                        <img src="{{ asset('storage/sistema/icono-humedad.png') }}" class="mr-1" style="width: 27px" />
                                        {{ __('Humidity') }}
                                    </div>
                                    <div class="text-sm text-yellow-400 font-bold dark:text-gray-200">
                                        {{ $maq->humedad." %" }}
                                        <div class="w-auto p-0"><span class="text-white inline-block py-0 px-2 text-xs font-medium rounded-full">
                                            {{ date("d/m/Y", strtotime($maq->updated_at))." / ".date("H:i:s", strtotime($maq->updated_at)) }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="relative w-full px-4 py-6 dark:bg-gray-700 rounded fondo-amarillo">
                                <div class="mb-2">
                                    <div class="flex items-center justify-between mb-2">
                                        <div class="flex items-center">
                                            <div class="flex flex-col">
                                                <span class="ml-2 font-bold texto-primero text-md dark:text-white">
                                                    {{ __('Ouputs') }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @foreach($maquinas_salidas as $sal)
                                    @if($sal->maquina_id == $maq->id)
                                        <!-- SOLICITUDES PENDIENTES DE CAMBIO DE PARAMETROS SALIDAS -->
                                        @if($sal->estatus_point == 1)
                                            <div class="bg-yellow-200 dark:bg-gray-800 mt-4 mb-6">
                                                <div class="px-3 py-3 mx-auto max-w-7xl sm:px-6 lg:px-8">
                                                    <div class="flex flex-wrap items-center justify-between">
                                                        <div class="flex items-center flex-1 w-0">
                                                            <span class="flex p-2 rounded-lg dark:bg-black fondo-rojo">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="w-6 h-6 text-white" viewBox="0 0 1792 1792">
                                                                    <path d="M1024 1375v-190q0-14-9.5-23.5t-22.5-9.5h-192q-13 0-22.5 9.5t-9.5 23.5v190q0 14 9.5 23.5t22.5 9.5h192q13 0 22.5-9.5t9.5-23.5zm-2-374l18-459q0-12-10-19-13-11-24-11h-220q-11 0-24 11-10 7-10 21l17 457q0 10 10 16.5t24 6.5h185q14 0 23.5-6.5t10.5-16.5zm-14-934l768 1408q35 63-2 126-17 29-46.5 46t-63.5 17h-1536q-34 0-63.5-17t-46.5-46q-37-63-2-126l768-1408q17-31 47-49t65-18 65 18 47 49z">
                                                                    </path>
                                                                </svg>
                                                            </span>
                                                            <p class="ml-3 font-medium">
                                                                <span class="md:inline texto-primary">
                                                                    {{ __('Waiting for temperature range update') }}
                                                                </span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        <!-- FIN SOLICITUDES PENDIENTES DE CAMBIO DE PARAMETROS SALIDAS -->
                                        @if($sal->salida == 1)
                                            <div class="flex items-center justify-between mb-2 fondo-gris rounded p-2">
                                                <div class="flex items-center">
                                                    @if($sal->estatus_estado_id == 0)
                                                        <div class="flex mr-2 font-medium rounded-lg text-xs bg-red-600 text-white font-bold py-2 px-2 rounded" style="font-size:0.6em">
                                                            {{ __('OFF') }}
                                                        </div>
                                                    @else
                                                        @if($sal->estatus_estado_id == 1)
                                                            <div class="flex mr-2 font-medium rounded-lg text-xs bg-green-600 text-white font-bold py-2 px-2 rounded" style="font-size:0.6em">
                                                                {{ __('ON') }}
                                                            </div>                                                                
                                                        @endif
                                                    @endif
                                                    <div class="flex flex-col">
                                                        <span class="ml-1 font-bold text-sm dark:text-white texto-azul">
                                                            {{ __('Temperature Range') }}
                                                        </span>
                                                        <span class="ml-1 text-sm dark:text-white texto-azul">
                                                            Set Point 1: <span style="font-weight:bold">{{ $sal->point1."°" }}</span> <span>Set Point 2:</span> <span style="font-weight:bold">{{ $sal->point2."°" }}
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="flex items-center">
                                                </div>
                                            </div>
                                        @endif
                                        @if($sal->salida == 2)
                                            <div class="flex items-center justify-between mb-2 fondo-gris rounded p-2">
                                                <div class="flex items-center">
                                                    @if($sal->estatus_estado_id == 0)
                                                        <div class="flex mr-2 font-medium rounded-lg text-xs bg-red-600 text-white font-bold py-2 px-2 rounded" style="font-size:0.6em">
                                                            {{ __('OFF') }}
                                                        </div>
                                                    @else
                                                        @if($sal->estatus_estado_id == 1 or $sal->estatus_estado_id == 2)
                                                            <div class="flex mr-2 font-medium rounded-lg text-xs bg-green-600 text-white font-bold py-2 px-2 rounded" style="font-size:0.6em">
                                                                {{ __('ON') }}
                                                            </div>                                                                
                                                        @endif
                                                    @endif
                                                    <div class="flex flex-col">
                                                        <span class="ml-1 font-bold text-sm dark:text-white texto-azul">
                                                            {{ __('Defrost parameters') }}
                                                        </span>
                                                        <span class="ml-1 text-sm dark:text-white texto-azul">
                                                            Frecuencia: <span style="font-weight:bold">{{ "Cada ".$sal->mostrar_frecuencia." horas" }}</span>
                                                                <br> 
                                                            Duración: <span style="font-weight:bold">{{ $sal->mostrar_duracion." minutos" }}</span>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="flex items-center">
                                                </div>
                                            </div>
                                        @endif
                                        @if($sal->salida == 3)
                                            <div class="flex items-center justify-between mb-2 fondo-gris rounded p-2">
                                                <div class="flex items-center">
                                                    @if($sal->estatus_estado_id == 0)
                                                        <div class="flex mr-2 font-medium rounded-lg text-xs bg-red-600 text-white font-bold py-2 px-2 rounded" style="font-size:0.6em">
                                                            {{ __('OFF') }}
                                                        </div>
                                                    @else
                                                        @if($sal->estatus_estado_id == 1 or $sal->estatus_estado_id == 4)
                                                            <div class="flex mr-2 font-medium rounded-lg text-xs bg-green-600 text-white font-bold py-2 px-2 rounded" style="font-size:0.6em">
                                                                {{ __('ON') }}
                                                            </div>                                                                
                                                        @endif
                                                    @endif
                                                    <div class="flex flex-col">
                                                        <span class="ml-1 font-bold text-sm dark:text-white texto-azul">
                                                            {{ __('Manual Output') }}
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="flex items-center">
                                                    @if($sal->estatus_estado_id == 0 and $maq->estatus_sistema == 0 )
                                                        <a wire:click="update_salida3({{ $sal->maquina_id }})" class="cursor-pointer font-medium rounded-lg text-xs bg-green-600 hover:bg-green-800 text-white font-bold py-2 px-2 rounded" style="font-size:0.6em">
                                                            {{ __('ON') }}
                                                        </a>
                                                    @else
                                                        @if(($sal->estatus_estado_id == 1 or $sal->estatus_estado_id == 4) and $maq->estatus_sistema == 0 )
                                                            <a wire:click="update_salida3({{ $sal->maquina_id }})" class="cursor-pointer font-medium rounded-lg text-xs bg-red-600 hover:bg-red-800 text-white font-bold py-2 px-2 rounded" style="font-size:0.6em">
                                                                {{ __('OFF') }}
                                                            </a>
                                                        @endif
                                                    @endif
                                                </div>
                                            </div>
                                        @endif
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <x-modal-ancho wire:model="open_parametros" class="w-full">
        <x-slot name="title">
            {{ __('Device Parameters') }}
        </x-slot>
        <x-slot name="content">
            <div class="items-center justify-between mb-2 border border-gray-400 p-2 rounded ">
                <div class="flex items-center">
                    <span class="relative p-2 fondo-primero rounded-xl">
                    </span>
                    <span class="ml-2 font-bold texto-primero text-base dark:text-white">
                        {{ ('Dispositivo') }}
                    </span>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-3 gap-2 my-0 p-2 rounded">
                    <div class="mb-2">
                        <x-label value="{{ __('Hour') }}" />
                        <select class="w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-300 rounded-md border border-primary pl-2 pr-2 py-2.5 focus:outline-none sm:text-sm" wire:model="hora_reloj">
                            <option value="">Seleccione...</option>
                            @foreach ($lista_horas as $hora)
                                <option value="{{ $hora->id_hora }}">{{ $hora->horas }}</option>
                            @endforeach
                        </select>
                        <x-input-error for="hora_reloj" />
                        </div>
                    <div class="mb-2">
                        <x-label value="{{ __('Minutes') }}" />
                        <select class="w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-300 rounded-md border border-primary pl-2 pr-2 py-2.5 focus:outline-none sm:text-sm" wire:model="minuto_reloj">
                            <option value="">Seleccione...</option>
                            @foreach ($lista_minutos as $minuto)
                                <option value="{{ $minuto->id_minuto }}">{{ $minuto->minutos }}</option>
                            @endforeach
                        </select>
                        <x-input-error for="minuto_reloj" />
                        </div>
                    <div class="mb-2">
                        <x-label value="{{ __('Day of the week') }}" />
                        <select class="w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-300 rounded-md border border-primary pl-2 pr-2 py-2.5 focus:outline-none sm:text-sm" wire:model="dia_id">
                            <option value="">Seleccione...</option>
                            @foreach ($lista_dias as $dia)
                                <option value="{{ $dia->id }}">{{ $dia->dias }}</option>
                            @endforeach
                        </select>
                        <x-input-error for="dia_id" />
                    </div>
                </div>
                <x-boton-primario wire:click="update_device" wire:loading.attr="disabled" wire:target="save" class="mb-2 disabled:opacity-25 ml-2">
                    {{ __('Send device data') }}
                </x-boton-primario>    
            </div>
            <div class="items-center justify-between mb-2 border border-gray-400 p-2 rounded">
                <div class="flex items-center">
                    <span class="relative p-2 fondo-primero rounded-xl">
                    </span>
                    <span class="ml-2 font-bold texto-primero text-base dark:text-white">
                        {{ __('Calibrate Temperature') }}
                    </span>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-3 gap-2 my-0 p-2 rounded">
                    <div class="mb-2">
                        <x-label value="{{ __('Sign') }}" />
                        <select class="w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-500 rounded-md border border-primary pl-2 pr-2 py-2.5 focus:outline-none sm:text-sm" wire:model="signo_calibrar" >
                            <option value="">Seleccione...</option>
                            <option value="48">+</option>
                            <option value="45">-</option>      
                        </select>
                        <x-input-error for="signo_calibrar" />
                    </div>
                    <div class="mb-2">
                        <x-label value="{{ __('Integer') }}" />
                        <select class="w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-500 rounded-md border border-primary pl-2 pr-2 py-2.5 focus:outline-none sm:text-sm" wire:model="entero_calibrar" >
                            <option value="">Seleccione...</option>
                            <option value="48">0</option>
                            <option value="49">1</option>
                            <option value="50">2</option>
                            <option value="51">3</option>
                            <option value="52">4</option>
                            <option value="53">5</option>
                            <option value="54">6</option>
                            <option value="55">7</option>
                            <option value="56">8</option>
                            <option value="57">9</option>
                            </select>
                        <x-input-error for="entero_calibrar" />
                    </div>
                    <div class="mb-2">
                        <x-label value="{{ __('Decimal') }}" />
                        <select class="w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-500 rounded-md border border-primary pl-2 pr-2 py-2.5 focus:outline-none sm:text-sm" wire:model="decimal_calibrar" >
                            <option value="">Seleccione...</option>
                            <option value="48">.0</option>
                            <option value="49">.1</option>
                            <option value="50">.2</option>
                            <option value="51">.3</option>
                            <option value="52">.4</option>
                            <option value="53">.5</option>
                            <option value="54">.6</option>
                            <option value="55">.7</option>
                            <option value="56">.8</option>
                            <option value="57">.9</option>
                            </select>
                        <x-input-error for="decimal_calibrar" />
                    </div>
                </div>
                <x-boton-primario wire:click="update_calibrar" wire:loading.attr="disabled" wire:target="update_calibrar" class="mb-2 disabled:opacity-25 ml-2">
                    {{ __('Send Temperature Calibration') }}
                </x-boton-primario>
            </div>
            <div class="items-center justify-between mb-2 border border-gray-400 p-2 rounded">
                <div class="flex items-center">
                    <span class="relative p-2 fondo-primero rounded-xl">
                    </span>
                    <span class="ml-2 font-bold texto-primero text-base dark:text-white">
                        {{ __('Temperature Range') }}
                    </span>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4 my-0 p-2 rounded">
                    <div class="mb-2">
                        <x-label value="{{ __('Set Point 1') }}" />
                        <x-input wire:model.defer="setpoint" type="text" class="w-full" />
                        <x-input-error for="setpoint"/>
                    </div>
                    <div class="mb-2">
                        <x-label value="{{ __('Set Point 2') }}" />
                        <x-input wire:model.defer="setpoint2" type="text" class="w-full" />
                        <x-input-error for="setpoint2"/>
                    </div>
                </div>
                <x-boton-primario wire:click="update_point" wire:loading.attr="disabled" class="disabled:opacity-25 ml-2 mb-4">
                    {{ __('Send Range Data') }}
                </x-boton-primario>
            </div>
            <div class="items-center justify-between mb-2 border border-gray-400 p-2 rounded">
                <div class="flex items-center">
                    <span class="relative p-2 fondo-primero rounded-xl">
                    </span>
                    <span class="ml-2 font-bold texto-primero text-base dark:text-white">
                        {{ __('Defrost parameters') }}
                    </span>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-2 my-0 p-2 rounded">
                    <div class="mb-2">
                        <x-label value="{{ __('Frequency') }}" />
                        <select class="w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-500 rounded-md border border-primary pl-2 pr-2 py-2.5 focus:outline-none sm:text-sm" wire:model="frecuencia_deshielo" >
                            <option value="">Seleccione...</option>
                            <option value="1">1 Hora</option>
                            <option value="2">2 Horas</option>
                            <option value="3">3 Horas</option>
                            <option value="4">4 Horas</option>
                            <option value="5">5 Horas</option>
                            <option value="6">6 Horas</option>
                            <option value="7">7 Horas</option>
                            <option value="8">8 Horas</option>
                            <option value="9">9 Horas</option>
                            <option value="10">10 Horas</option>
                            <option value="12">12 Horas</option>
                            <option value="14">14 Horas</option>
                            <option value="16">16 Horas</option>
                            <option value="18">18 Horas</option>
                            <option value="20">20 Horas</option>
                            <option value="22">22 Horas</option>
                            <option value="24">24 Horas</option>
                            </select>
                        <x-input-error for="frecuencia_deshielo" />
                    </div>
                    <div class="mb-2">
                        <x-label value="{{ __('Duration') }}" />
                        <select class="w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-500 rounded-md border border-primary pl-2 pr-2 py-2.5 focus:outline-none sm:text-sm" wire:model="duracion_deshielo" >
                            <option value="">Seleccione...</option>
                            <option value="5">5 minutos</option>
                            <option value="15">15 minutos</option>
                            <option value="30">30 minutos</option>
                            <option value="60">60 minutos</option>
                            <option value="90">90 minutos</option>
                            <option value="120">120 minutos</option>
                            <option value="150">150 minutos</option>
                            <option value="180">180 minutos</option>      
                        </select>
                        <x-input-error for="duracion_deshielo" />
                    </div>
                </div>
                <x-boton-primario wire:click="update_deshielo" wire:loading.attr="disabled" wire:target="save" class="mb-2 disabled:opacity-25 ml-2">
                    {{ __('Send Defrost parameters') }}
                </x-boton-primario>
                <x-boton-secundario wire:click="update_deshielo_disabled" wire:loading.attr="disabled" wire:target="save" class="mb-2 disabled:opacity-25 ml-2">
                    {{ __('Defrost disabled') }}
                </x-boton-secundario>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click="$set('open_parametros',false)">
                {{ __('Cancel') }}
            </x-secondary-button>
        </x-slot>
    </x-modal-ancho>
    <x-dialog-modal wire:model="open_edit_maquina">
        <x-slot name="title">
            {{ __('Machine') }}
        </x-slot>
        <x-slot name="content">
            <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-4 my-0 p-2 rounded">
                <div class="mb-2">
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
    @push('js')
        <script src="sweetalert2.all.min.js"></script>
        <script>
            Livewire.on('sistema1', maquina => { 
                    Swal.fire({
                    title: "¿{{ __('Are you sure to ENABLE the system') }}?",
                    text: "{{ __('All features will be available') }}",
                    icon: 'warning',
                    cancelButtonText: '{{ __("Cancel") }}',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '¡{{ __("Yes, Im sure") }}!'
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        @this.call('update_sistema', maquina)

                        Swal.fire(
                            '',
                            '{{ __("Sent.") }}',
                            'success'
                        )
                    }
                })
            });

            Livewire.on('sistema2', maquina => { 
                    Swal.fire({
                    title: "¿{{ __('Are you sure to DISABLE the system') }}?",
                    text: "{{ __('Only manual output will remain active') }}",
                    icon: 'warning',
                    cancelButtonText: '{{ __("Cancel") }}',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '¡{{ __("Yes, Im sure") }}!'
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        @this.call('update_sistema', maquina)

                        Swal.fire(
                            '',
                            '{{ __("Sent.") }}',
                            'success'
                        )
                    }
                })
            });
        </script>
    @endpush
</div>

<script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

<script>
//    setInterval("location.reload()", 10000);
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
