<div>
    <x-layouts.menu-franquicia>
        <div class="container" wire:poll>
            <span class="text-2xl font-semi-bold leading-normal">{{ __('Dashboard') }}</span>
            <div class="col-12" style="overflow-x: auto">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 my-4 p-2 rounded">
                    @foreach($maquinas as $maq)
                        @if($maq->modelo == 2) <!-- MODELO MECAELECT --> 
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

                                        @if($maq->encendido_permanente == 1)
                                            <div class="flex items-center">
                                                <label class="inline-flex items-center mb-5 cursor-pointer">
                                                    <input type="checkbox" value="" class="sr-only peer" checked wire:click="encendido_permanente_no({{ $maq->id }})">
                                                    <div class="relative w-9 h-5 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                                                    <span class="ms-3 text-gray-900 dark:text-gray-300" style="font-size: 0.8em">{{ __('Permanent ON') }}</span>
                                                </label>
                                            </div>
                                        @else
                                            <div class="flex items-center">
                                                <label class="inline-flex items-center mb-5 cursor-pointer">
                                                    <input type="checkbox" value="" class="sr-only peer" wire:click="encendido_permanente_si({{ $maq->id }})">
                                                    <div class="relative w-9 h-5 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                                                    <span class="ms-3 text-gray-900 dark:text-gray-300" style="font-size: 0.8em">{{ __('Permanent ON') }}</span>
                                                </label>
                                            </div>
                                        @endif

                                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-2 p-2 rounded" style="margin-top: -10px">
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
                                                                        Set Point 1: <span style="font-weight:bold">{{ $sal->point1."°C" }}</span> <span>Set Point 2:</span> <span style="font-weight:bold">{{ $sal->point2."°C" }}
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
                        @else
                            @if($maq->modelo == 3) <!-- MODELO MULTIFACTOR (NUEVAS) --> 
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
                                        @if($maq->estatus_ajuste_hum == 1)
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
                                                                    {{ __('Waiting for humidity update.') }}
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
                                                        <a wire:click="edit_parametros_modelo3({{ $maq }})" class="cursor-pointer" title="Name nachine edit"><i class="icofont icofont-gear texto-azul" style="font-size: 1em"></i></a>
                                                    </button>
                                                    <button class="p-1 mr-0 text-sm text-gray-400">
                                                        <a wire:click="edit_name_maquina({{ $maq }})" class="cursor-pointer" title="{{ __('Name nachine edit') }}"><i class="icofont icofont-edit-alt texto-azul" style="font-size: 1em"></i></a>
                                                    </button>
                                                </div>
                                            </div>

                                            <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-2 p-2 rounded" style="margin-top: -10px">
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
                                            </div>
                                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-2 p-2 rounded" style="margin-top: -10px">
                                                <div class="flex-1 w-full text-center p-2 border-2 border-gray-100 rounded text-white fondo-primero">
                                                    <div class="flex items-center text-xs dark:text-white text-center">
                                                        <img src="{{ asset('storage/sistema/icono-temperatura.png') }}" class="mr-1" style="width: 27px" />
                                                        {{ __('Temperature') }}
                                                    </div>
                                                    <div class="text-sm text-yellow-400 font-bold dark:text-gray-200">
                                                        {{ number_format($maq->temperatura,1)." °C" }}
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
                                                        {{ number_format($maq->humedad, 1)." %" }}
                                                        <div class="w-auto p-0"><span class="text-white inline-block py-0 px-2 text-xs font-medium rounded-full">
                                                            {{ date("d/m/Y", strtotime($maq->updated_at))." / ".date("H:i:s", strtotime($maq->updated_at)) }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="relative w-full px-2 py-2 dark:bg-gray-700 rounded fondo-amarillo mb-2">
                                                <div class="flex flex-col">
                                                    <span class="ml-2 font-bold texto-primero text-md dark:text-white">
                                                        {{ __('Factor de Corrección') }}
                                                    </span>
                                                </div>
                                                <div class="flex items-center justify-between mb-2 rounded p-2">
                                                    <div class="text-center rounded fondo-gris p-2">
                                                        <span class="ml-1 font-bold text-sm dark:text-white texto-azul">
                                                            {{ __('Temperatura') }}
                                                        </span>
                                                        <span class="ml-1 text-sm dark:text-white texto-azul">
                                                            <span style="font-weight:bold">{{ number_format($maq->ajuste_temperatura,1)."°C" }}
                                                        </span>
                                                    </div>
                                                    <br>
                                                    <div class="text-center rounded fondo-gris p-2">
                                                        <span class="ml-1 font-bold text-sm dark:text-white texto-azul">
                                                            {{ __('Humedad') }}
                                                        </span>
                                                        <span class="ml-1 text-sm dark:text-white texto-azul">
                                                            <span style="font-weight:bold">{{ number_format($maq->ajuste_humedad,1)."%" }}
                                                        </span>
                                                    </div>
                                                    <div class="flex items-center">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="relative w-full px-4 py-6 dark:bg-gray-700 rounded fondo-amarillo">
                                                {{ "CHORIZO : ".$maq->chorizo }}
                                                @foreach($maquinas_salidas as $sal)
                                                    @if($sal->maquina_id == $maq->id)
                                                        <!-- SOLICITUDES PENDIENTES DE CAMBIO DE PARAMETROS SALIDAS -->
                                                        @if($sal->estatus_parametros == 1)
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
                                                                                    {{ __('Waiting update') }}
                                                                                </span>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                        <!-- FIN SOLICITUDES PENDIENTES DE CAMBIO DE PARAMETROS SALIDAS -->

                                                        @if($sal->salida == 1)
                                                            @if($sal->modo_salida == 0)
                                                                <div class="flex items-center justify-between mb-2">
                                                                    <div class="flex items-center font-bold texto-primero text-md dark:text-white">
                                                                        {{ __('Output 1 - Manual') }}
                                                                    </div>
                                                                    <div class="flex items-center">
                                                                        <button class="p-1 mr-0 text-sm text-gray-400">
                                                                            <a wire:click="edit_salidas_modelo3({{ $sal->maquina_id }}, {{ $sal->salida }})" class="cursor-pointer" title="Output edit"><i class="icofont icofont-gear texto-azul" style="font-size: 1em"></i></a>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                                <div class="flex items-center justify-between mb-2 fondo-gris rounded p-2">
                                                                    <div class="flex items-center">
                                                                        @if($sal->estatus_estado_id == 0)
                                                                            <div class="flex mr-2 font-medium rounded-lg text-xs bg-red-600 text-white font-bold py-2 px-2 rounded" style="font-size:0.6em">
                                                                                {{ 'OFF' }}
                                                                            </div>
                                                                        @else
                                                                            @if($sal->estatus_estado_id == 1 or $sal->estatus_estado_id == 2 or $sal->estatus_estado_id == 4)
                                                                                <div class="flex mr-2 font-medium rounded-lg text-xs bg-green-600 text-white font-bold py-2 px-2 rounded" style="font-size:0.6em">
                                                                                    {{ 'ON' }}
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
                                                                            <a wire:click="update_salida_manual1({{ $sal->maquina_id }})" class="cursor-pointer font-medium rounded-lg text-xs bg-green-600 hover:bg-green-800 text-white font-bold py-2 px-2 rounded" style="font-size:0.6em">
                                                                                {{ 'ON' }}
                                                                            </a>
                                                                        @else
                                                                            @if(($sal->estatus_estado_id == 1 or $sal->estatus_estado_id == 4) and $maq->estatus_sistema == 0 )
                                                                                <a wire:click="update_salida_manual1({{ $sal->maquina_id }})" class="cursor-pointer font-medium rounded-lg text-xs bg-red-600 hover:bg-red-800 text-white font-bold py-2 px-2 rounded" style="font-size:0.6em">
                                                                                    {{ 'OFF' }}
                                                                                </a>
                                                                            @endif
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            @else
                                                                @if($sal->modo_salida == 16)
                                                                    <div class="flex items-center justify-between mb-2">
                                                                        <div class="flex items-center font-bold texto-primero text-md dark:text-white">
                                                                            {{ __('Output 1 - Temperatura') }}
                                                                        </div>
                                                                        <div class="flex items-center">
                                                                            <button class="p-1 mr-0 text-sm text-gray-400">
                                                                                <a wire:click="edit_salidas_modelo3({{ $sal->maquina_id }}, {{ $sal->salida }})" class="cursor-pointer" title="Output edit"><i class="icofont icofont-gear texto-azul" style="font-size: 1em"></i></a>
                                                                            </button>
@php /*
                                                                            <button class="p-1 mr-0 text-sm text-gray-400">
                                                                                <a wire:click="correccion_salidas_modelo3({{ $sal->maquina_id }}, {{ $sal->salida }})" class="cursor-pointer" title="Factor de corrección"><i class="icofont icofont-edit-alt texto-azul" style="font-size: 1em"></i></a>
                                                                            </button>
*/ @endphp
                                                                            </div>
                                                                    </div>
                                                                    <div class="flex items-center justify-between mb-2 p-2">
                                                                        <div class="flex items-center">
                                                                            @if($sal->estatus_estado_id == 0)
                                                                                <div class="flex mr-2 font-medium rounded-lg text-xs bg-red-600 text-white font-bold py-2 px-2 rounded" style="font-size:0.6em">
                                                                                    {{ 'OFF' }}
                                                                                </div>
                                                                            @else
                                                                                @if($sal->estatus_estado_id == 1 or $sal->estatus_estado_id == 2 or $sal->estatus_estado_id == 4)
                                                                                    <div class="flex mr-2 font-medium rounded-lg text-xs bg-green-600 text-white font-bold py-2 px-2 rounded" style="font-size:0.6em">
                                                                                        {{ 'ON' }}
                                                                                    </div>
                                                                                @endif
                                                                            @endif
                                                                        </div>
                                                                        <div class="flex items-center">
                                                                            <div class="text-center fondo-gris rounded p-2 mr-2">
                                                                                <span class="ml-1 font-bold text-sm dark:text-white texto-azul">
                                                                                    {{ __('Mínima') }}
                                                                                </span>
                                                                                <span class="ml-1 text-sm dark:text-white texto-azul">
                                                                                    <span style="font-weight:bold">{{ $sal->parametro1."°C" }}
                                                                                </span>
                                                                            </div>
                                                                            <br>
                                                                            <div class="text-center fondo-gris rounded p-2">
                                                                                <span class="ml-1 font-bold text-sm dark:text-white texto-azul">
                                                                                    {{ __('Máxima') }}
                                                                                </span>
                                                                                <span class="ml-1 text-sm dark:text-white texto-azul">
                                                                                    <span style="font-weight:bold">{{ $sal->parametro2."°C" }}
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="flex items-center">
                                                                        </div>
                                                                    </div>
                                                                @else
                                                                    @if($sal->modo_salida == 32)
                                                                        <div class="flex items-center justify-between mb-2">
                                                                            <div class="flex items-center font-bold texto-primero text-md dark:text-white">
                                                                                    {{ __('Output 1 - Humedad') }}
                                                                            </div>
                                                                            <div class="flex items-center">
                                                                                <button class="p-1 mr-0 text-sm text-gray-400">
                                                                                    <a wire:click="edit_salidas_modelo3({{ $sal->maquina_id }}, {{ $sal->salida }})" class="cursor-pointer" title="Output edit"><i class="icofont icofont-gear texto-azul" style="font-size: 1em"></i></a>
                                                                                </button>
@php /*
                                                                                <button class="p-1 mr-0 text-sm text-gray-400">
                                                                                    <a wire:click="correccion_salidas_modelo3({{ $sal->maquina_id }}, {{ $sal->salida }})" class="cursor-pointer" title="Factor de corrección"><i class="icofont icofont-edit-alt texto-azul" style="font-size: 1em"></i></a>
                                                                                </button>
*/ @endphp
                                                                            </div>
                                                                        </div>
                                                                        <div class="flex items-center justify-between mb-2 p-2">
                                                                            <div class="flex items-center">
                                                                                @if($sal->estatus_estado_id == 0)
                                                                                    <div class="flex mr-2 font-medium rounded-lg text-xs bg-red-600 text-white font-bold py-2 px-2 rounded" style="font-size:0.6em">
                                                                                        {{ 'OFF' }}
                                                                                    </div>
                                                                                @else
                                                                                    @if($sal->estatus_estado_id == 1 or $sal->estatus_estado_id == 2 or $sal->estatus_estado_id == 4)
                                                                                        <div class="flex mr-2 font-medium rounded-lg text-xs bg-green-600 text-white font-bold py-2 px-2 rounded" style="font-size:0.6em">
                                                                                            {{ 'ON' }}
                                                                                        </div>
                                                                                    @endif
                                                                                @endif
                                                                            </div>
                                                                            <div class="flex items-center">
                                                                                <div class="text-center fondo-gris rounded p-2 mr-2">
                                                                                    <span class="ml-1 font-bold text-sm dark:text-white texto-azul">
                                                                                        {{ __('Mínima') }}
                                                                                    </span>
                                                                                    <span class="ml-1 text-sm dark:text-white texto-azul">
                                                                                        <span style="font-weight:bold">{{ $sal->parametro1."%" }}
                                                                                    </span>
                                                                                </div>
                                                                                <br>
                                                                                <div class="text-center fondo-gris rounded p-2">
                                                                                    <span class="ml-1 font-bold text-sm dark:text-white texto-azul">
                                                                                        {{ __('Máxima') }}
                                                                                    </span>
                                                                                    <span class="ml-1 text-sm dark:text-white texto-azul">
                                                                                        <span style="font-weight:bold">{{ $sal->parametro2."%" }}
                                                                                    </span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="flex items-center">
                                                                            </div>
                                                                        </div>
                                                                    @else
                                                                        @if($sal->modo_salida == 48)
                                                                            <div class="flex items-center justify-between mb-2">
                                                                                <div class="flex items-center font-bold texto-primero text-md dark:text-white">
                                                                                    {{ __('Output 1 - Horario') }}
                                                                                </div>
                                                                                <div class="flex items-center">
                                                                                    <button class="p-1 mr-0 text-sm text-gray-400">
                                                                                        <a wire:click="edit_salidas_modelo3({{ $sal->maquina_id }}, {{ $sal->salida }})" class="cursor-pointer" title="Output edit"><i class="icofont icofont-gear texto-azul" style="font-size: 1em"></i></a>
                                                                                    </button>
@php /*
                                                                                    <button class="p-1 mr-0 text-sm text-gray-400">
                                                                                        <a wire:click="correccion_salidas_modelo3({{ $sal->maquina_id }}, {{ $sal->salida }})" class="cursor-pointer" title="Factor de corrección"><i class="icofont icofont-edit-alt texto-azul" style="font-size: 1em"></i></a>
                                                                                    </button>
*/ @endphp
                                                                                </div>
                                                                            </div>
                                                                            <div class="flex items-center justify-between mb-2 p-2">
                                                                                <div class="flex items-center">
                                                                                    @if($sal->estatus_estado_id == 0)
                                                                                        <div class="flex mr-2 font-medium rounded-lg text-xs bg-red-600 text-white font-bold py-2 px-2 rounded" style="font-size:0.6em">
                                                                                            {{ 'OFF' }}
                                                                                        </div>
                                                                                    @else
                                                                                        @if($sal->estatus_estado_id == 1 or $sal->estatus_estado_id == 2 or $sal->estatus_estado_id == 4)
                                                                                            <div class="flex mr-2 font-medium rounded-lg text-xs bg-green-600 text-white font-bold py-2 px-2 rounded" style="font-size:0.6em">
                                                                                                {{ 'ON' }}
                                                                                            </div>
                                                                                        @endif
                                                                                    @endif
                                                                                </div>
                                                                                <div class="flex items-center">
                                                                                    <div class="text-center fondo-gris rounded p-2 mr-2">
                                                                                        <span class="ml-1 font-bold text-sm dark:text-white texto-azul">
                                                                                            {{ __('Hora ON') }}
                                                                                        </span>
                                                                                        <span class="ml-1 text-sm dark:text-white texto-azul">
                                                                                            <span style="font-weight:bold">{{ $sal->parametro1 }}
                                                                                        </span>
                                                                                    </div>
                                                                                    <div class="text-center fondo-gris rounded p-2">
                                                                                        <span class="ml-1 font-bold text-sm dark:text-white texto-azul">
                                                                                            {{ __('Hora OFF') }}
                                                                                        </span>
                                                                                        <span class="ml-1 text-sm dark:text-white texto-azul">
                                                                                            <span style="font-weight:bold">{{ $sal->parametro2 }}
                                                                                        </span>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="flex items-center">
                                                                                </div>
                                                                            </div>
                                                                        @else
                                                                            @if($sal->modo_salida == 64)
                                                                                <div class="flex items-center justify-between mb-2">
                                                                                    <div class="flex items-center font-bold texto-primero text-md dark:text-white">
                                                                                        {{ __('Output 1 - Cíclico') }}
                                                                                    </div>
                                                                                    <div class="flex items-center">
                                                                                        <button class="p-1 mr-0 text-sm text-gray-400">
                                                                                            <a wire:click="edit_salidas_modelo3({{ $sal->maquina_id }}, {{ $sal->salida }})" class="cursor-pointer" title="Output edit"><i class="icofont icofont-gear texto-azul" style="font-size: 1em"></i></a>
                                                                                        </button>
@php /*
                                                                                        <button class="p-1 mr-0 text-sm text-gray-400">
                                                                                            <a wire:click="correccion_salidas_modelo3({{ $sal->maquina_id }}, {{ $sal->salida }})" class="cursor-pointer" title="Factor de corrección"><i class="icofont icofont-edit-alt texto-azul" style="font-size: 1em"></i></a>
                                                                                        </button>
*/ @endphp
                                                                                    </div>
                                                                                </div>
                                                                                <div class="flex items-center justify-between mb-0 p-2">
                                                                                    <div class="flex items-center">
                                                                                        @if($sal->estatus_estado_id == 0)
                                                                                            <div class="flex mr-2 font-medium rounded-lg text-xs bg-red-600 text-white font-bold py-2 px-2 rounded" style="font-size:0.6em">
                                                                                                {{ 'OFF' }}
                                                                                            </div>
                                                                                        @else
                                                                                            @if($sal->estatus_estado_id == 1 or $sal->estatus_estado_id == 2 or $sal->estatus_estado_id == 4)
                                                                                                <div class="flex mr-2 font-medium rounded-lg text-xs bg-green-600 text-white font-bold py-2 px-2 rounded" style="font-size:0.6em">
                                                                                                    {{ 'ON' }}
                                                                                                </div>
                                                                                            @endif
                                                                                        @endif
                                                                                    </div>
                                                                                    <div class="flex items-center">
                                                                                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-2 p-2 rounded" style="margin-top: -10px">
                                                                                            <div class="text-center fondo-gris rounded p-2 mr-2">
                                                                                                <span class="ml-1 font-bold text-sm dark:text-white texto-azul">
                                                                                                    {{ __('Frecuencia') }}
                                                                                                </span>
                                                                                                <br/>
                                                                                                <span class="ml-1 text-sm dark:text-white texto-azul">
                                                                                                    <span style="font-weight:bold">{{ $sal->parametro1." hora(s)" }}</span>
                                                                                                </span>
                                                                                            </div>
                                                                                            <div class="text-center fondo-gris rounded p-2">
                                                                                                <span class="ml-1 font-bold text-sm dark:text-white texto-azul">
                                                                                                    {{ __('Duración ') }}
                                                                                                    </br>
                                                                                                </span>
                                                                                                <span class="ml-1 text-sm dark:text-white texto-azul">
                                                                                                    <span style="font-weight:bold">{{ $sal->parametro2." minuto(s)" }}</span>
                                                                                                </span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="flex items-center">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="items-center w-full text-center fondo-gris rounded p-2 mb-2">
                                                                                    @if($sal->estatus_estado_id == 0)
                                                                                        @php
                                                                                        $parametro3 = 60 - $sal->parametro3;
                                                                                        $parametro4 = $sal->parametro1 - ($sal->parametro4 + 1);

                                                                                        $cant3 = strlen($parametro3);
                                                                                        if($cant3 < 2)
                                                                                        {
                                                                                            $parametro3 = "0".$parametro3;
                                                                                        }

                                                                                        $cant4 = strlen($parametro4);
                                                                                        if($cant4 < 2)
                                                                                        {
                                                                                            $parametro4 = "0".$parametro4;
                                                                                        }
                                                                                        @endphp

                                                                                        <span class="font-bold text-sm dark:text-white texto-azul">{{ "Se activa en (HH:MM): ".$parametro4.":".$parametro3 }}</span>
                                                                                    @else
                                                                                        @php
                                                                                        $parametro3 = 60 - $sal->parametro3;
                                                                                        $parametro4 = $sal->parametro2 - $sal->parametro4;

                                                                                        $cant3 = strlen($parametro3);
                                                                                        if($cant3 < 2)
                                                                                        {
                                                                                            $parametro3 = "0".$parametro3;
                                                                                        }

                                                                                        $cant4 = strlen($parametro4);
                                                                                        if($cant4 < 2)
                                                                                        {
                                                                                            $parametro4 = "0".$parametro4;
                                                                                        }
                                                                                        @endphp

                                                                                        <span class="font-bold text-sm dark:text-white texto-azul">{{ "Termina en (MM:SS): ".$parametro4.":".$parametro3 }}</span>
                                                                                    @endif
                                                                                </div>
                                                                            @endif
                                                                        @endif
                                                                    @endif
                                                                @endif
                                                            @endif
                                                        @else
                                                            @if($sal->salida == 2)
                                                                @if($sal->modo_salida == 0)
                                                                    <div class="flex items-center justify-between mb-2">
                                                                        <div class="flex items-center font-bold texto-primero text-md dark:text-white">
                                                                            {{ __('Output 2 - Manual') }}
                                                                        </div>
                                                                        <div class="flex items-center">
                                                                            <button class="p-1 mr-0 text-sm text-gray-400">
                                                                                <a wire:click="edit_salidas_modelo3({{ $sal->maquina_id }}, {{ $sal->salida }})" class="cursor-pointer" title="Output edit"><i class="icofont icofont-gear texto-azul" style="font-size: 1em"></i></a>
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                    <div class="flex items-center justify-between mb-2 fondo-gris rounded p-2">
                                                                        <div class="flex items-center">
                                                                            @if($sal->estatus_estado_id == 0)
                                                                                <div class="flex mr-2 font-medium rounded-lg text-xs bg-red-600 text-white font-bold py-2 px-2 rounded" style="font-size:0.6em">
                                                                                    {{ 'OFF' }}
                                                                                </div>
                                                                            @else
                                                                                @if($sal->estatus_estado_id == 1 or $sal->estatus_estado_id == 2 or $sal->estatus_estado_id == 4)
                                                                                    <div class="flex mr-2 font-medium rounded-lg text-xs bg-green-600 text-white font-bold py-2 px-2 rounded" style="font-size:0.6em">
                                                                                        {{ 'ON' }}
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
                                                                                <a wire:click="update_salida_manual2({{ $sal->maquina_id }})" class="cursor-pointer font-medium rounded-lg text-xs bg-green-600 hover:bg-green-800 text-white font-bold py-2 px-2 rounded" style="font-size:0.6em">
                                                                                    {{ 'ON' }}
                                                                                </a>
                                                                            @else
                                                                                @if(($sal->estatus_estado_id == 1 or $sal->estatus_estado_id == 2) and $maq->estatus_sistema == 0 )
                                                                                    <a wire:click="update_salida_manual2({{ $sal->maquina_id }})" class="cursor-pointer font-medium rounded-lg text-xs bg-red-600 hover:bg-red-800 text-white font-bold py-2 px-2 rounded" style="font-size:0.6em">
                                                                                        {{ 'OFF' }}
                                                                                    </a>
                                                                                @endif
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                @else
                                                                    @if($sal->modo_salida == 16)
                                                                        <div class="flex items-center justify-between mb-2">
                                                                            <div class="flex items-center font-bold texto-primero text-md dark:text-white">
                                                                                {{ __('Output 2 - Temperatura') }}
                                                                            </div>
                                                                            <div class="flex items-center">
                                                                                <button class="p-1 mr-0 text-sm text-gray-400">
                                                                                    <a wire:click="edit_salidas_modelo3({{ $sal->maquina_id }}, {{ $sal->salida }})" class="cursor-pointer" title="Output edit"><i class="icofont icofont-gear texto-azul" style="font-size: 1em"></i></a>
                                                                                </button>
@php /*
                                                                                <button class="p-1 mr-0 text-sm text-gray-400">
                                                                                    <a wire:click="correccion_salidas_modelo3({{ $sal->maquina_id }}, {{ $sal->salida }})" class="cursor-pointer" title="Factor de corrección"><i class="icofont icofont-edit-alt texto-azul" style="font-size: 1em"></i></a>
                                                                                </button>
*/ @endphp
                                                                            </div>
                                                                        </div>
                                                                        <div class="flex items-center justify-between mb-2 p-2">
                                                                            <div class="flex items-center">
                                                                                @if($sal->estatus_estado_id == 0)
                                                                                    <div class="flex mr-2 font-medium rounded-lg text-xs bg-red-600 text-white font-bold py-2 px-2 rounded" style="font-size:0.6em">
                                                                                        {{ 'OFF' }}
                                                                                    </div>
                                                                                @else
                                                                                    @if($sal->estatus_estado_id == 1 or $sal->estatus_estado_id == 2 or $sal->estatus_estado_id == 4)
                                                                                        <div class="flex mr-2 font-medium rounded-lg text-xs bg-green-600 text-white font-bold py-2 px-2 rounded" style="font-size:0.6em">
                                                                                            {{ 'ON' }}
                                                                                        </div>
                                                                                    @endif
                                                                                @endif
                                                                            </div>
                                                                            <div class="flex items-center">
                                                                                <div class="text-center fondo-gris rounded p-2 mr-2">
                                                                                    <span class="ml-1 font-bold text-sm dark:text-white texto-azul">
                                                                                        {{ __('Mínima') }}
                                                                                    </span>
                                                                                    <span class="ml-1 text-sm dark:text-white texto-azul">
                                                                                        <span style="font-weight:bold">{{ $sal->parametro1."°C" }}
                                                                                    </span>
                                                                                </div>
                                                                                <br>
                                                                                <div class="text-center fondo-gris rounded p-2">
                                                                                    <span class="ml-1 font-bold text-sm dark:text-white texto-azul">
                                                                                        {{ __('Máxima') }}
                                                                                    </span>
                                                                                    <span class="ml-1 text-sm dark:text-white texto-azul">
                                                                                        <span style="font-weight:bold">{{ $sal->parametro2."°C" }}
                                                                                    </span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="flex items-center">
                                                                            </div>
                                                                        </div>
                                                                    @else
                                                                        @if($sal->modo_salida == 32)
                                                                            <div class="flex items-center justify-between mb-2">
                                                                                <div class="flex items-center font-bold texto-primero text-md dark:text-white">
                                                                                        {{ __('Output 2 - Humedad') }}
                                                                                </div>
                                                                                <div class="flex items-center">
                                                                                    <button class="p-1 mr-0 text-sm text-gray-400">
                                                                                        <a wire:click="edit_salidas_modelo3({{ $sal->maquina_id }}, {{ $sal->salida }})" class="cursor-pointer" title="Output edit"><i class="icofont icofont-gear texto-azul" style="font-size: 1em"></i></a>
                                                                                    </button>
@php /*
                                                                                    <button class="p-1 mr-0 text-sm text-gray-400">
                                                                                        <a wire:click="correccion_salidas_modelo3({{ $sal->maquina_id }}, {{ $sal->salida }})" class="cursor-pointer" title="Factor de corrección"><i class="icofont icofont-edit-alt texto-azul" style="font-size: 1em"></i></a>
                                                                                    </button>
*/ @endphp
                                                                                </div>
                                                                            </div>
                                                                            <div class="flex items-center justify-between mb-2 p-2">
                                                                                <div class="flex items-center">
                                                                                    @if($sal->estatus_estado_id == 0)
                                                                                        <div class="flex mr-2 font-medium rounded-lg text-xs bg-red-600 text-white font-bold py-2 px-2 rounded" style="font-size:0.6em">
                                                                                            {{ 'OFF' }}
                                                                                        </div>
                                                                                    @else
                                                                                        @if($sal->estatus_estado_id == 1 or $sal->estatus_estado_id == 2 or $sal->estatus_estado_id == 4)
                                                                                            <div class="flex mr-2 font-medium rounded-lg text-xs bg-green-600 text-white font-bold py-2 px-2 rounded" style="font-size:0.6em">
                                                                                                {{ 'ON' }}
                                                                                            </div>
                                                                                        @endif
                                                                                    @endif
                                                                                </div>
                                                                                <div class="flex items-center">
                                                                                    <div class="text-center fondo-gris rounded p-2 mr-2">
                                                                                        <span class="ml-1 font-bold text-sm dark:text-white texto-azul">
                                                                                            {{ __('Mínima') }}
                                                                                        </span>
                                                                                        <span class="ml-1 text-sm dark:text-white texto-azul">
                                                                                            <span style="font-weight:bold">{{ $sal->parametro1."%" }}
                                                                                        </span>
                                                                                    </div>
                                                                                    <br>
                                                                                    <div class="text-center fondo-gris rounded p-2">
                                                                                        <span class="ml-1 font-bold text-sm dark:text-white texto-azul">
                                                                                            {{ __('Máxima') }}
                                                                                        </span>
                                                                                        <span class="ml-1 text-sm dark:text-white texto-azul">
                                                                                            <span style="font-weight:bold">{{ $sal->parametro2."%" }}
                                                                                        </span>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="flex items-center">
                                                                                </div>
                                                                            </div>
                                                                        @else
                                                                            @if($sal->modo_salida == 48)
                                                                                <div class="flex items-center justify-between mb-2">
                                                                                    <div class="flex items-center font-bold texto-primero text-md dark:text-white">
                                                                                        {{ __('Output 2 - Horario') }}
                                                                                    </div>
                                                                                    <div class="flex items-center">
                                                                                        <button class="p-1 mr-0 text-sm text-gray-400">
                                                                                            <a wire:click="edit_salidas_modelo3({{ $sal->maquina_id }}, {{ $sal->salida }})" class="cursor-pointer" title="Output edit"><i class="icofont icofont-gear texto-azul" style="font-size: 1em"></i></a>
                                                                                        </button>
@php /*
                                                                                        <button class="p-1 mr-0 text-sm text-gray-400">
                                                                                            <a wire:click="correccion_salidas_modelo3({{ $sal->maquina_id }}, {{ $sal->salida }})" class="cursor-pointer" title="Factor de corrección"><i class="icofont icofont-edit-alt texto-azul" style="font-size: 1em"></i></a>
                                                                                        </button>
*/ @endphp
                                                                                    </div>
                                                                                </div>
                                                                                <div class="flex items-center justify-between mb-2 p-2">
                                                                                    <div class="flex items-center">
                                                                                        @if($sal->estatus_estado_id == 0)
                                                                                            <div class="flex mr-2 font-medium rounded-lg text-xs bg-red-600 text-white font-bold py-2 px-2 rounded" style="font-size:0.6em">
                                                                                                {{ 'OFF' }}
                                                                                            </div>
                                                                                        @else
                                                                                            @if($sal->estatus_estado_id == 1 or $sal->estatus_estado_id == 2 or $sal->estatus_estado_id == 4)
                                                                                                <div class="flex mr-2 font-medium rounded-lg text-xs bg-green-600 text-white font-bold py-2 px-2 rounded" style="font-size:0.6em">
                                                                                                    {{ 'ON' }}
                                                                                                </div>
                                                                                            @endif
                                                                                        @endif
                                                                                    </div>
                                                                                    <div class="flex items-center">
                                                                                        <div class="text-center fondo-gris rounded p-2 mr-2">
                                                                                            <span class="ml-1 font-bold text-sm dark:text-white texto-azul">
                                                                                                {{ __('Hora ON') }}
                                                                                            </span>
                                                                                            <span class="ml-1 text-sm dark:text-white texto-azul">
                                                                                                <span style="font-weight:bold">{{ $sal->parametro1 }}
                                                                                            </span>
                                                                                        </div>
                                                                                        <div class="text-center fondo-gris rounded p-2">
                                                                                            <span class="ml-1 font-bold text-sm dark:text-white texto-azul">
                                                                                                {{ __('Hora OFF') }}
                                                                                            </span>
                                                                                            <span class="ml-1 text-sm dark:text-white texto-azul">
                                                                                                <span style="font-weight:bold">{{ $sal->parametro2 }}
                                                                                            </span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="flex items-center">
                                                                                    </div>
                                                                                </div>
                                                                            @else
                                                                                @if($sal->modo_salida == 64)
                                                                                    <div class="flex items-center justify-between mb-2">
                                                                                        <div class="flex items-center font-bold texto-primero text-md dark:text-white">
                                                                                            {{ __('Output 2 - Cíclico') }}
                                                                                        </div>
                                                                                        <div class="flex items-center">
                                                                                            <button class="p-1 mr-0 text-sm text-gray-400">
                                                                                                <a wire:click="edit_salidas_modelo3({{ $sal->maquina_id }}, {{ $sal->salida }})" class="cursor-pointer" title="Output edit"><i class="icofont icofont-gear texto-azul" style="font-size: 1em"></i></a>
                                                                                            </button>
@php /*
                                                                                            <button class="p-1 mr-0 text-sm text-gray-400">
                                                                                                <a wire:click="correccion_salidas_modelo3({{ $sal->maquina_id }}, {{ $sal->salida }})" class="cursor-pointer" title="Factor de corrección"><i class="icofont icofont-edit-alt texto-azul" style="font-size: 1em"></i></a>
                                                                                            </button>
*/ @endphp
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="flex items-center justify-between mb-0 p-2">
                                                                                        <div class="flex items-center">
                                                                                            @if($sal->estatus_estado_id == 0)
                                                                                                <div class="flex mr-2 font-medium rounded-lg text-xs bg-red-600 text-white font-bold py-2 px-2 rounded" style="font-size:0.6em">
                                                                                                    {{ 'OFF' }}
                                                                                                </div>
                                                                                            @else
                                                                                                @if($sal->estatus_estado_id == 1 or $sal->estatus_estado_id == 2 or $sal->estatus_estado_id == 4)
                                                                                                    <div class="flex mr-2 font-medium rounded-lg text-xs bg-green-600 text-white font-bold py-2 px-2 rounded" style="font-size:0.6em">
                                                                                                        {{ 'ON' }}
                                                                                                    </div>
                                                                                                @endif
                                                                                            @endif
                                                                                        </div>
                                                                                        <div class="flex items-center">
                                                                                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-2 p-2 rounded" style="margin-top: -10px">
                                                                                                <div class="text-center fondo-gris rounded p-2 mr-2">
                                                                                                    <span class="ml-1 font-bold text-sm dark:text-white texto-azul">
                                                                                                        {{ __('Frecuencia') }}
                                                                                                    </span>
                                                                                                    <br/>
                                                                                                    <span class="ml-1 text-sm dark:text-white texto-azul">
                                                                                                        <span style="font-weight:bold">{{ $sal->parametro1." hora(s)" }}</span>
                                                                                                    </span>
                                                                                                </div>
                                                                                                <div class="text-center fondo-gris rounded p-2">
                                                                                                    <span class="ml-1 font-bold text-sm dark:text-white texto-azul">
                                                                                                        {{ __('Duración ') }}
                                                                                                        </br>
                                                                                                    </span>
                                                                                                    <span class="ml-1 text-sm dark:text-white texto-azul">
                                                                                                        <span style="font-weight:bold">{{ $sal->parametro2." minuto(s)" }}</span>
                                                                                                    </span>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="flex items-center">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="items-center w-full text-center fondo-gris rounded p-2 mb-2">
                                                                                        @if($sal->estatus_estado_id == 0)
                                                                                            @php
                                                                                            $parametro3 = 60 - $sal->parametro3;
                                                                                            $parametro4 = $sal->parametro1 - ($sal->parametro4 + 1);

                                                                                            $cant3 = strlen($parametro3);
                                                                                            if($cant3 < 2)
                                                                                            {
                                                                                                $parametro3 = "0".$parametro3;
                                                                                            }
 
                                                                                            $cant4 = strlen($parametro4);
                                                                                            if($cant4 < 2)
                                                                                            {
                                                                                                $parametro4 = "0".$parametro4;
                                                                                            }
                                                                                            @endphp

                                                                                            <span class="font-bold text-sm dark:text-white texto-azul">{{ "Se activa en (HH:MM): ".$parametro4.":".$parametro3 }}</span>
                                                                                        @else
                                                                                            @php

                                                                                            $cant3 = strlen($parametro3);
                                                                                            if($cant3 < 2)
                                                                                            {
                                                                                                $parametro3 = "0".$parametro3;
                                                                                            }
 
                                                                                            $cant4 = strlen($parametro4);
                                                                                            if($cant4 < 2)
                                                                                            {
                                                                                                $parametro4 = "0".$parametro4;
                                                                                            }

                                                                                            $parametro3 = 60 - $sal->parametro3;
                                                                                            $parametro4 = $sal->parametro2 - $sal->parametro4;
                                                                                            @endphp

                                                                                            <span class="font-bold text-sm dark:text-white texto-azul">{{ "Termina en (MM:SS): ".$parametro4.":".$parametro3 }}</span>
                                                                                        @endif
                                                                                    </div>
                                                                                @endif
                                                                            @endif
                                                                        @endif
                                                                    @endif
                                                                @endif
                                                            @else
                                                                @if($sal->salida == 3)
                                                                    @if($sal->modo_salida == 0)
                                                                        <div class="flex items-center justify-between mb-2">
                                                                            <div class="flex items-center font-bold texto-primero text-md dark:text-white">
                                                                                {{ __('Output 3 - Manual') }}
                                                                            </div>
                                                                            <div class="flex items-center">
                                                                                <button class="p-1 mr-0 text-sm text-gray-400">
                                                                                    <a wire:click="edit_salidas_modelo3({{ $sal->maquina_id }}, {{ $sal->salida }})" class="cursor-pointer" title="Output edit"><i class="icofont icofont-gear texto-azul" style="font-size: 1em"></i></a>
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                        <div class="flex items-center justify-between mb-2 fondo-gris rounded p-2">
                                                                            <div class="flex items-center">
                                                                                @if($sal->estatus_estado_id == 0)
                                                                                    <div class="flex mr-2 font-medium rounded-lg text-xs bg-red-600 text-white font-bold py-2 px-2 rounded" style="font-size:0.6em">
                                                                                        {{ 'OFF' }}
                                                                                    </div>
                                                                                @else
                                                                                    @if($sal->estatus_estado_id == 1 or $sal->estatus_estado_id == 2 or $sal->estatus_estado_id == 4)
                                                                                        <div class="flex mr-2 font-medium rounded-lg text-xs bg-green-600 text-white font-bold py-2 px-2 rounded" style="font-size:0.6em">
                                                                                            {{ 'ON' }}
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
                                                                                    <a wire:click="update_salida_manual3({{ $sal->maquina_id }})" class="cursor-pointer font-medium rounded-lg text-xs bg-green-600 hover:bg-green-800 text-white font-bold py-2 px-2 rounded" style="font-size:0.6em">
                                                                                        {{ 'ON' }}
                                                                                    </a>
                                                                                @else
                                                                                    @if(($sal->estatus_estado_id == 1 or $sal->estatus_estado_id == 4) and $maq->estatus_sistema == 0 )
                                                                                        <a wire:click="update_salida_manual3({{ $sal->maquina_id }})" class="cursor-pointer font-medium rounded-lg text-xs bg-red-600 hover:bg-red-800 text-white font-bold py-2 px-2 rounded" style="font-size:0.6em">
                                                                                            {{ 'OFF' }}
                                                                                        </a>
                                                                                    @endif
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                    @else
                                                                        @if($sal->modo_salida == 16)
                                                                            <div class="flex items-center justify-between mb-2">
                                                                                <div class="flex items-center font-bold texto-primero text-md dark:text-white">
                                                                                    {{ __('Output 3 - Temperatura') }}
                                                                                </div>
                                                                                <div class="flex items-center">
                                                                                    <button class="p-1 mr-0 text-sm text-gray-400">
                                                                                        <a wire:click="edit_salidas_modelo3({{ $sal->maquina_id }}, {{ $sal->salida }})" class="cursor-pointer" title="Output edit"><i class="icofont icofont-gear texto-azul" style="font-size: 1em"></i></a>
                                                                                    </button>
@php /*
                                                                                    <button class="p-1 mr-0 text-sm text-gray-400">
                                                                                        <a wire:click="correccion_salidas_modelo3({{ $sal->maquina_id }}, {{ $sal->salida }})" class="cursor-pointer" title="Factor de corrección"><i class="icofont icofont-edit-alt texto-azul" style="font-size: 1em"></i></a>
                                                                                    </button>
*/ @endphp
                                                                                </div>
                                                                            </div>
                                                                            <div class="flex items-center justify-between mb-2 p-2">
                                                                                <div class="flex items-center">
                                                                                    @if($sal->estatus_estado_id == 0)
                                                                                        <div class="flex mr-2 font-medium rounded-lg text-xs bg-red-600 text-white font-bold py-2 px-2 rounded" style="font-size:0.6em">
                                                                                            {{ 'OFF' }}
                                                                                        </div>
                                                                                    @else
                                                                                        @if($sal->estatus_estado_id == 1 or $sal->estatus_estado_id == 2 or $sal->estatus_estado_id == 4)
                                                                                            <div class="flex mr-2 font-medium rounded-lg text-xs bg-green-600 text-white font-bold py-2 px-2 rounded" style="font-size:0.6em">
                                                                                                {{ 'ON' }}
                                                                                            </div>
                                                                                        @endif
                                                                                    @endif
                                                                                </div>
                                                                                <div class="flex items-center">
                                                                                    <div class="text-center fondo-gris rounded p-2 mr-2">
                                                                                        <span class="ml-1 font-bold text-sm dark:text-white texto-azul">
                                                                                            {{ __('Mínima') }}
                                                                                        </span>
                                                                                        <span class="ml-1 text-sm dark:text-white texto-azul">
                                                                                            <span style="font-weight:bold">{{ $sal->parametro1."°C" }}
                                                                                        </span>
                                                                                    </div>
                                                                                    <br>
                                                                                    <div class="text-center fondo-gris rounded p-2">
                                                                                        <span class="ml-1 font-bold text-sm dark:text-white texto-azul">
                                                                                            {{ __('Máxima') }}
                                                                                        </span>
                                                                                        <span class="ml-1 text-sm dark:text-white texto-azul">
                                                                                            <span style="font-weight:bold">{{ $sal->parametro2."°C" }}
                                                                                        </span>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="flex items-center">
                                                                                </div>
                                                                            </div>
                                                                        @else
                                                                            @if($sal->modo_salida == 32)
                                                                                <div class="flex items-center justify-between mb-2">
                                                                                    <div class="flex items-center font-bold texto-primero text-md dark:text-white">
                                                                                            {{ __('Output 3 - Humedad') }}
                                                                                    </div>
                                                                                    <div class="flex items-center">
                                                                                        <button class="p-1 mr-0 text-sm text-gray-400">
                                                                                            <a wire:click="edit_salidas_modelo3({{ $sal->maquina_id }}, {{ $sal->salida }})" class="cursor-pointer" title="Output edit"><i class="icofont icofont-gear texto-azul" style="font-size: 1em"></i></a>
                                                                                        </button>
@php /*
                                                                                        <button class="p-1 mr-0 text-sm text-gray-400">
                                                                                            <a wire:click="correccion_salidas_modelo3({{ $sal->maquina_id }}, {{ $sal->salida }})" class="cursor-pointer" title="Factor de corrección"><i class="icofont icofont-edit-alt texto-azul" style="font-size: 1em"></i></a>
                                                                                        </button>
*/ @endphp
                                                                                    </div>
                                                                                </div>
                                                                                <div class="flex items-center justify-between mb-2 p-2">
                                                                                    <div class="flex items-center">
                                                                                        @if($sal->estatus_estado_id == 0)
                                                                                            <div class="flex mr-2 font-medium rounded-lg text-xs bg-red-600 text-white font-bold py-2 px-2 rounded" style="font-size:0.6em">
                                                                                                {{ 'OFF' }}
                                                                                            </div>
                                                                                        @else
                                                                                            @if($sal->estatus_estado_id == 1 or $sal->estatus_estado_id == 2 or $sal->estatus_estado_id == 4)
                                                                                                <div class="flex mr-2 font-medium rounded-lg text-xs bg-green-600 text-white font-bold py-2 px-2 rounded" style="font-size:0.6em">
                                                                                                    {{ 'ON' }}
                                                                                                </div>
                                                                                            @endif
                                                                                        @endif
                                                                                    </div>
                                                                                    <div class="flex items-center">
                                                                                        <div class="text-center fondo-gris rounded p-2 mr-2">
                                                                                            <span class="ml-1 font-bold text-sm dark:text-white texto-azul">
                                                                                                {{ __('Mínima') }}
                                                                                            </span>
                                                                                            <span class="ml-1 text-sm dark:text-white texto-azul">
                                                                                                <span style="font-weight:bold">{{ $sal->parametro1."%" }}
                                                                                            </span>
                                                                                        </div>
                                                                                        <br>
                                                                                        <div class="text-center fondo-gris rounded p-2">
                                                                                            <span class="ml-1 font-bold text-sm dark:text-white texto-azul">
                                                                                                {{ __('Máxima') }}
                                                                                            </span>
                                                                                            <span class="ml-1 text-sm dark:text-white texto-azul">
                                                                                                <span style="font-weight:bold">{{ $sal->parametro2."%" }}
                                                                                            </span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="flex items-center">
                                                                                    </div>
                                                                                </div>
                                                                            @else
                                                                                @if($sal->modo_salida == 48)
                                                                                    <div class="flex items-center justify-between mb-2">
                                                                                        <div class="flex items-center font-bold texto-primero text-md dark:text-white">
                                                                                            {{ __('Output 3 - Horario') }}
                                                                                        </div>
                                                                                        <div class="flex items-center">
                                                                                            <button class="p-1 mr-0 text-sm text-gray-400">
                                                                                                <a wire:click="edit_salidas_modelo3({{ $sal->maquina_id }}, {{ $sal->salida }})" class="cursor-pointer" title="Output edit"><i class="icofont icofont-gear texto-azul" style="font-size: 1em"></i></a>
                                                                                            </button>
@php /*
                                                                                            <button class="p-1 mr-0 text-sm text-gray-400">
                                                                                                <a wire:click="correccion_salidas_modelo3({{ $sal->maquina_id }}, {{ $sal->salida }})" class="cursor-pointer" title="Factor de corrección"><i class="icofont icofont-edit-alt texto-azul" style="font-size: 1em"></i></a>
                                                                                            </button>
*/ @endphp
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="flex items-center justify-between mb-2 p-2">
                                                                                        <div class="flex items-center">
                                                                                            @if($sal->estatus_estado_id == 0)
                                                                                                <div class="flex mr-2 font-medium rounded-lg text-xs bg-red-600 text-white font-bold py-2 px-2 rounded" style="font-size:0.6em">
                                                                                                    {{ 'OFF' }}
                                                                                                </div>
                                                                                            @else
                                                                                                @if($sal->estatus_estado_id == 1 or $sal->estatus_estado_id == 2 or $sal->estatus_estado_id == 4)
                                                                                                    <div class="flex mr-2 font-medium rounded-lg text-xs bg-green-600 text-white font-bold py-2 px-2 rounded" style="font-size:0.6em">
                                                                                                        {{ 'ON' }}
                                                                                                    </div>
                                                                                                @endif
                                                                                            @endif
                                                                                        </div>
                                                                                        <div class="flex items-center">
                                                                                            <div class="text-center fondo-gris rounded p-2 mr-2">
                                                                                                <span class="ml-1 font-bold text-sm dark:text-white texto-azul">
                                                                                                    {{ __('Hora ON') }}
                                                                                                </span>
                                                                                                <span class="ml-1 text-sm dark:text-white texto-azul">
                                                                                                    <span style="font-weight:bold">{{ $sal->parametro1 }}
                                                                                                </span>
                                                                                            </div>
                                                                                            <div class="text-center fondo-gris rounded p-2">
                                                                                                <span class="ml-1 font-bold text-sm dark:text-white texto-azul">
                                                                                                    {{ __('Hora OFF') }}
                                                                                                </span>
                                                                                                <span class="ml-1 text-sm dark:text-white texto-azul">
                                                                                                    <span style="font-weight:bold">{{ $sal->parametro2 }}
                                                                                                </span>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="flex items-center">
                                                                                        </div>
                                                                                    </div>
                                                                                @else
                                                                                    @if($sal->modo_salida == 64)
                                                                                        <div class="flex items-center justify-between mb-2">
                                                                                            <div class="flex items-center font-bold texto-primero text-md dark:text-white">
                                                                                                {{ __('Output 3 - Cíclico') }}
                                                                                            </div>
                                                                                            <div class="flex items-center">
                                                                                                <button class="p-1 mr-0 text-sm text-gray-400">
                                                                                                    <a wire:click="edit_salidas_modelo3({{ $sal->maquina_id }}, {{ $sal->salida }})" class="cursor-pointer" title="Output edit"><i class="icofont icofont-gear texto-azul" style="font-size: 1em"></i></a>
                                                                                                </button>
@php /*
                                                                                                <button class="p-1 mr-0 text-sm text-gray-400">
                                                                                                    <a wire:click="correccion_salidas_modelo3({{ $sal->maquina_id }}, {{ $sal->salida }})" class="cursor-pointer" title="Factor de corrección"><i class="icofont icofont-edit-alt texto-azul" style="font-size: 1em"></i></a>
                                                                                                </button>
*/ @endphp
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="flex items-center justify-between mb-0 p-2">
                                                                                            <div class="flex items-center">
                                                                                                @if($sal->estatus_estado_id == 0)
                                                                                                    <div class="flex mr-2 font-medium rounded-lg text-xs bg-red-600 text-white font-bold py-2 px-2 rounded" style="font-size:0.6em">
                                                                                                        {{ 'OFF' }}
                                                                                                    </div>
                                                                                                @else
                                                                                                    @if($sal->estatus_estado_id == 1 or $sal->estatus_estado_id == 2 or $sal->estatus_estado_id == 4)
                                                                                                        <div class="flex mr-2 font-medium rounded-lg text-xs bg-green-600 text-white font-bold py-2 px-2 rounded" style="font-size:0.6em">
                                                                                                            {{ 'ON' }}
                                                                                                        </div>
                                                                                                    @endif
                                                                                                @endif
                                                                                            </div>
                                                                                            <div class="flex items-center">
                                                                                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-2 p-2 rounded" style="margin-top: -10px">
                                                                                                    <div class="text-center fondo-gris rounded p-2 mr-2">
                                                                                                        <span class="ml-1 font-bold text-sm dark:text-white texto-azul">
                                                                                                            {{ __('Frecuencia') }}
                                                                                                        </span>
                                                                                                        <br/>
                                                                                                        <span class="ml-1 text-sm dark:text-white texto-azul">
                                                                                                            <span style="font-weight:bold">{{ $sal->parametro1." hora(s)" }}</span>
                                                                                                        </span>
                                                                                                    </div>
                                                                                                    <div class="text-center fondo-gris rounded p-2">
                                                                                                        <span class="ml-1 font-bold text-sm dark:text-white texto-azul">
                                                                                                            {{ __('Duración ') }}
                                                                                                            </br>
                                                                                                        </span>
                                                                                                        <span class="ml-1 text-sm dark:text-white texto-azul">
                                                                                                            <span style="font-weight:bold">{{ $sal->parametro2." minuto(s)" }}</span>
                                                                                                        </span>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="flex items-center">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="items-center w-full text-center fondo-gris rounded p-2 mb-2">
                                                                                            @if($sal->estatus_estado_id == 0)
                                                                                                @php
                                                                                                $parametro3 = 60 - $sal->parametro3;
                                                                                                $parametro4 = $sal->parametro1 - ($sal->parametro4 + 1);

                                                                                                $cant3 = strlen($parametro3);
                                                                                                if($cant3 < 2)
                                                                                                {
                                                                                                    $parametro3 = "0".$parametro3;
                                                                                                }
    
                                                                                                $cant4 = strlen($parametro4);
                                                                                                if($cant4 < 2)
                                                                                                {
                                                                                                    $parametro4 = "0".$parametro4;
                                                                                                }
                                                                                                @endphp

                                                                                                <span class="font-bold text-sm dark:text-white texto-azul">{{ "Se activa en (HH:MM): ".$parametro4.":".$parametro3 }}</span>
                                                                                            @else
                                                                                                @php
                                                                                                $parametro3 = 60 - $sal->parametro3;
                                                                                                $parametro4 = $sal->parametro2 - $sal->parametro4;

                                                                                                $cant3 = strlen($parametro3);
                                                                                                if($cant3 < 2)
                                                                                                {
                                                                                                    $parametro3 = "0".$parametro3;
                                                                                                }
    
                                                                                                $cant4 = strlen($parametro4);
                                                                                                if($cant4 < 2)
                                                                                                {
                                                                                                    $parametro4 = "0".$parametro4;
                                                                                                }
                                                                                                @endphp

                                                                                                <span class="font-bold text-sm dark:text-white texto-azul">{{ "Termina en (MM:SS): ".$parametro4.":".$parametro3 }}</span>
                                                                                            @endif
                                                                                        </div>    
                                                                                    @endif
                                                                                @endif
                                                                            @endif
                                                                        @endif
                                                                    @endif
                                                                @endif                                                            
                                                            @endif                                                        
                                                        @endif
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                @if($maq->modelo == 4) <!-- MODELO 4 MULTIFACTOR (NUEVAS) VOLTAJE --> 
                                    <div class="w-full">
                                        <div class="relative w-full px-4 py-6 bg-white shadow-lg dark:bg-gray-700 rounded">
                                            <!-- SOLICITUDES PENDIENTES DE CAMBIO DE PARAMETROS MAQUINAS -->
                                            @if($maq->estatus_voltaje == 1)
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
                                                                        {{ __('Waiting for voltaje date update.') }}
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
                                                            <a wire:click="edit_parametros_modelo4({{ $maq }})" class="cursor-pointer" title="Name nachine edit"><i class="icofont icofont-gear texto-azul" style="font-size: 1em"></i></a>
                                                        </button>
                                                        <button class="p-1 mr-0 text-sm text-gray-400">
                                                            <a wire:click="edit_name_maquina({{ $maq }})" class="cursor-pointer" title="{{ __('Name nachine edit') }}"><i class="icofont icofont-edit-alt texto-azul" style="font-size: 1em"></i></a>
                                                        </button>
                                                    </div>
                                                </div>

                                                <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-2 p-2 rounded" style="margin-top: -10px">
                                                    <div class="flex-1 w-full text-center p-2 border-2 border-gray-100 rounded text-white fondo-primero">
                                                        <div class="flex items-center text-xl dark:text-white text-center">
                                                            <img src="{{ asset('storage/sistema/voltaje.png') }}" class="mr-1" style="width: 25px" />
                                                            {{ __('Voltaje') }}
                                                        </div>
                                                        <div class="text-xl text-yellow-400 font-bold dark:text-gray-200">
                                                            {{ number_format($maq->voltaje,2) }}
                                                            <div class="w-auto p-0"><span class="text-white inline-block py-0 px-2 text-xs font-medium rounded-full">
                                                                {{ date("d/m/Y", strtotime($maq->updated_at))." / ".date("H:i:s", strtotime($maq->updated_at)) }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="flex-1 w-full text-center p-2 border-2 border-gray-100 rounded text-white fondo-primero">
                                                        <div class="flex items-center text-xl dark:text-white text-center">
                                                            <img src="{{ asset('storage/sistema/voltaje.png') }}" class="mr-1" style="width: 25px" />
                                                            {{ __('Factor') }}
                                                        </div>
                                                        <div class="text-xl text-yellow-400 font-bold dark:text-gray-200">
                                                            {{ number_format($maq->factor_voltaje,2) }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endif
                        @endif
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
            <x-dialog-modal wire:model="open_parametros_modelo4" class="w-full">
                <x-slot name="title">
                    {{ __('Voltaje Parameters') }}
                </x-slot>
                <x-slot name="content">
                    <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-4 my-0 p-2 rounded">
                        <div class="mb-2">
                            <x-label value="{{ __('Introduzca el Factor de Corrección') }}" />
                            <x-input wire:model.defer="factor_voltaje" type="text" class="w-full" />
                            <x-input-error for="factor_voltaje"/>
                        </div>
                    </div>
                    <x-boton-primario wire:click="update_factor_voltaje" wire:loading.attr="disabled" class="disabled:opacity-25 ml-2 mb-4">
                        {{ __('Send Factor Voltaje') }}
                    </x-boton-primario>
                </x-slot>
                <x-slot name="footer">
                    <x-secondary-button wire:click="$set('open_parametros_modelo4',false)">
                        {{ __('Cancel') }}
                    </x-secondary-button>
                </x-slot>
            </x-dilaog-modal>
            <x-modal-ancho wire:model="open_parametros_modelo3" class="w-full">
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
                                <select class="w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-500 rounded-md border border-primary pl-2 pr-2 py-2.5 focus:outline-none sm:text-sm" wire:model="signo_calibrar_temp" >
                                    <option value="">Seleccione...</option>
                                    <option value="0">+</option>
                                    <option value="1">-</option>      
                                </select>
                                <x-input-error for="signo_calibrar_temp" />
                            </div>
                            <div class="mb-2">
                                <x-label value="{{ __('Integer') }}" />
                                <select class="w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-500 rounded-md border border-primary pl-2 pr-2 py-2.5 focus:outline-none sm:text-sm" wire:model="entero_calibrar_temp" >
                                    <option value="">Seleccione...</option>
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    </select>
                                <x-input-error for="entero_calibrar_temp" />
                            </div>
                            <div class="mb-2">
                                <x-label value="{{ __('Decimal') }}" />
                                <select class="w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-500 rounded-md border border-primary pl-2 pr-2 py-2.5 focus:outline-none sm:text-sm" wire:model="decimal_calibrar_temp" >
                                    <option value="">Seleccione...</option>
                                    <option value="0">.0</option>
                                    <option value="1">.1</option>
                                    <option value="2">.2</option>
                                    <option value="3">.3</option>
                                    <option value="4">.4</option>
                                    <option value="5">.5</option>
                                    <option value="6">.6</option>
                                    <option value="7">.7</option>
                                    <option value="8">.8</option>
                                    <option value="9">.9</option>
                                    </select>
                                <x-input-error for="decimal_calibrar_temp" />
                            </div>
                        </div>
                        <x-boton-primario wire:click="update_calibrar_temp_modelo3" wire:loading.attr="disabled" wire:target="update_calibrar_temp_modelo3" class="mb-2 disabled:opacity-25 ml-2">
                            {{ __('Send Temperature Calibration') }}
                        </x-boton-primario>
                    </div>
                    <div class="items-center justify-between mb-2 border border-gray-400 p-2 rounded">
                        <div class="flex items-center">
                            <span class="relative p-2 fondo-primero rounded-xl">
                            </span>
                            <span class="ml-2 font-bold texto-primero text-base dark:text-white">
                                {{ __('Calibrate Humedad') }}
                            </span>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-3 gap-2 my-0 p-2 rounded">
                            <div class="mb-2">
                                <x-label value="{{ __('Sign') }}" />
                                <select class="w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-500 rounded-md border border-primary pl-2 pr-2 py-2.5 focus:outline-none sm:text-sm" wire:model="signo_calibrar_hum" >
                                    <option value="">Seleccione...</option>
                                    <option value="0">+</option>
                                    <option value="1">-</option>      
                                </select>
                                <x-input-error for="signo_calibrar_hum" />
                            </div>
                            <div class="mb-2">
                                <x-label value="{{ __('Integer') }}" />
                                <select class="w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-500 rounded-md border border-primary pl-2 pr-2 py-2.5 focus:outline-none sm:text-sm" wire:model="entero_calibrar_hum" >
                                    <option value="">Seleccione...</option>
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    </select>
                                <x-input-error for="entero_calibrar_hum" />
                            </div>
                            <div class="mb-2">
                                <x-label value="{{ __('Decimal') }}" />
                                <select class="w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-500 rounded-md border border-primary pl-2 pr-2 py-2.5 focus:outline-none sm:text-sm" wire:model="decimal_calibrar_hum" >
                                    <option value="">Seleccione...</option>
                                    <option value="0">.0</option>
                                    <option value="1">.1</option>
                                    <option value="2">.2</option>
                                    <option value="3">.3</option>
                                    <option value="4">.4</option>
                                    <option value="5">.5</option>
                                    <option value="6">.6</option>
                                    <option value="7">.7</option>
                                    <option value="8">.8</option>
                                    <option value="9">.9</option>
                                    </select>
                                <x-input-error for="decimal_calibrar_hum" />
                            </div>
                        </div>
                        <x-boton-primario wire:click="update_calibrar_hum" wire:loading.attr="disabled" wire:target="update_calibrar" class="mb-2 disabled:opacity-25 ml-2">
                            {{ __('Send Humedad Calibration') }}
                        </x-boton-primario>
                    </div>
                </x-slot>
                <x-slot name="footer">
                    <x-secondary-button wire:click="$set('open_parametros_modelo3',false)">
                        {{ __('Cancel') }}
                    </x-secondary-button>
                </x-slot>
            </x-modal-ancho>
            <x-dialog-modal wire:model="open_salidas_modelo3" class="w-full">
                <x-slot name="title">
                    {{ __('Config Output') }}
                </x-slot>
                <x-slot name="content">
                    <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-4 my-0 p-2 rounded mt-4">
                        <div class="mb-4">
                            <x-label value="{{ __('Cambiar la Salida a Modo') }}" />
                            <select class="w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-300 rounded-md border border-primary pl-2 pr-2 py-2.5 focus:outline-none sm:text-sm" wire:model.live="seleccion_modo_salida" >
                                <option value="">Seleccione</option>
                                <option value="0">Manual</option>
                                <option value="16">Temperatura</option>
                                <option value="32">Humedad</option>
                                <option value="48">Reloj</option>
                                <option value="64">Cíclico</option>
                            </select>
                            <x-input-error for="usuario_id" />
                        </div>
                        @if($seleccion_modo_salida == 0)
                            <x-boton-primario wire:click="update_modo_salida" wire:loading.attr="disabled" wire:target="update_calibrar" class="mb-2 disabled:opacity-25 ml-2">
                                {{ __('Send Modo Salida Manual') }}
                            </x-boton-primario>
                        @else
                            @if($seleccion_modo_salida == 16)
                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4 my-0 p-2 rounded">
                                    <div class="mb-2">
                                        <x-label value="Míninimo" />
                                        <x-input wire:model.defer="nuevo_parametro_temp1" type="text" class="w-full" />
                                        <x-input-error for="nuevo_parametro_temp1"/>
                                    </div>
                                    <div class="mb-2">
                                        <x-label value="Máximo" />
                                        <x-input wire:model.defer="nuevo_parametro_temp2" type="text" class="w-full" />
                                        <x-input-error for="nuevo_parametro_temp2"/>
                                    </div>
                                </div>
                                <x-boton-primario wire:click="update_modo_salida" wire:loading.attr="disabled" wire:target="update_calibrar" class="mb-2 disabled:opacity-25 ml-2">
                                    {{ __('Send Modo Temperatura') }}
                                </x-boton-primario>
                            @else
                                @if($seleccion_modo_salida == 32)
                                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4 my-0 p-2 rounded">
                                        <div class="mb-2">
                                            <x-label value="Míninimo" />
                                            <x-input wire:model.defer="nuevo_parametro_hum1" type="text" class="w-full" />
                                            <x-input-error for="nuevo_parametro_hum1"/>
                                        </div>
                                        <div class="mb-2">
                                            <x-label value="Máximo" />
                                            <x-input wire:model.defer="nuevo_parametro_hum2" type="text" class="w-full" />
                                            <x-input-error for="nuevo_parametro_hum2"/>
                                        </div>
                                    </div>
                                    <x-boton-primario wire:click="update_modo_salida" wire:loading.attr="disabled" wire:target="update_calibrar" class="mb-2 disabled:opacity-25 ml-2">
                                        {{ __('Send Modo Humedad') }}
                                    </x-boton-primario>
                                @else
                                    @if($seleccion_modo_salida == 48)
                                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4 my-0 p-2 rounded">
                                            <div class="mb-2">
                                                <x-label value="{{ __('Hour') }}" />
                                                <select class="w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-300 rounded-md border border-primary pl-2 pr-2 py-2.5 focus:outline-none sm:text-sm" wire:model="nuevo_parametro_hora">
                                                    <option value="">Seleccione...</option>
                                                    @foreach ($lista_horas as $hora)
                                                        <option value="{{ $hora->id_hora }}">{{ $hora->horas }}</option>
                                                    @endforeach
                                                </select>
                                                <x-input-error for="nuevo_parametro_hora" />
                                            </div>
                                            <div class="mb-2">
                                                <x-label value="{{ __('Minutes') }}" />
                                                <select class="w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-300 rounded-md border border-primary pl-2 pr-2 py-2.5 focus:outline-none sm:text-sm" wire:model="nuevo_parametro_minuto">
                                                    <option value="">Seleccione...</option>
                                                    @foreach ($lista_minutos as $minuto)
                                                        <option value="{{ $minuto->id_minuto }}">{{ $minuto->minutos }}</option>
                                                    @endforeach
                                                </select>
                                                <x-input-error for="nuevo_parametro_minuto" />
                                            </div>
                                            <div class="mb-2">
                                                <x-label value="{{ __('Hour') }}" />
                                                <select class="w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-300 rounded-md border border-primary pl-2 pr-2 py-2.5 focus:outline-none sm:text-sm" wire:model="nuevo_parametro_hora2">
                                                    <option value="">Seleccione...</option>
                                                    @foreach ($lista_horas as $hora)
                                                        <option value="{{ $hora->id_hora }}">{{ $hora->horas }}</option>
                                                    @endforeach
                                                </select>
                                                <x-input-error for="nuevo_parametro_hora2" />
                                            </div>
                                            <div class="mb-2">
                                                <x-label value="{{ __('Minutes') }}" />
                                                <select class="w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-300 rounded-md border border-primary pl-2 pr-2 py-2.5 focus:outline-none sm:text-sm" wire:model="nuevo_parametro_minuto2">
                                                    <option value="">Seleccione...</option>
                                                    @foreach ($lista_minutos as $minuto)
                                                        <option value="{{ $minuto->id_minuto }}">{{ $minuto->minutos }}</option>
                                                    @endforeach
                                                </select>
                                                <x-input-error for="nuevo_parametro_minuto2" />
                                            </div>
                                        </div>
                                        <x-boton-primario wire:click="update_modo_salida" wire:loading.attr="disabled" wire:target="update_calibrar" class="mb-2 disabled:opacity-25 ml-2">
                                            {{ __('Send Modo Reloj') }}
                                        </x-boton-primario>
                                    @else
                                        @if($seleccion_modo_salida == 64)
                                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4 my-0 p-2 rounded">
                                                <div class="mb-2">
                                                    <x-label value="{{ __('Frequency') }}" />
                                                    <select class="w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-500 rounded-md border border-primary pl-2 pr-2 py-2.5 focus:outline-none sm:text-sm" wire:model.live="nuevo_parametro_frecuencia" >
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
                                                    <x-input-error for="nuevo_parametro_frecuencia" />
                                                </div>
                                                <div class="mb-2">
                                                    <x-label value="{{ __('Duration') }}" />
                                                    <select class="w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-500 rounded-md border border-primary pl-2 pr-2 py-2.5 focus:outline-none sm:text-sm" wire:model.live="nuevo_parametro_duracion" >
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
                                                    <x-input-error for="nuevo_parametro_duracion" />
                                                </div>
                                            </div>
                                            <x-boton-primario wire:click="update_modo_salida" wire:loading.attr="disabled" wire:target="update_calibrar" class="mb-2 disabled:opacity-25 ml-2">
                                                {{ __('Send Modo Cíclico') }}
                                            </x-boton-primario>
                                        @endif
                                    @endif
                                @endif
                            @endif
                        @endif
                    </div>
                </x-slot>
                <x-slot name="footer">
                    <x-secondary-button wire:click="$set('open_salidas_modelo3',false)">
                        {{ __('Cancel') }}
                    </x-secondary-button>
                </x-slot>
            </x-dialog-modal>
            <x-dialog-modal wire:model="open_correccion_salidas_modelo3" class="w-full">
                <x-slot name="title">
                    {{ __('Corrección Output') }}
                </x-slot>
                <x-slot name="content">
                        @if($seleccion_modo_salida == 0)
                            Salida Manual, no puede aplicar corrección
                        @else
                            @if($seleccion_modo_salida == 16)
                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4 my-0 p-2 rounded">
                                    <div class="mb-2">
                                        <x-label value="Mínima" />
                                        <x-input wire:model.defer="corr_parametro_temp1" type="text" class="w-full" />
                                        <x-input-error for="corr_parametro_temp1"/>
                                    </div>
                                    <div class="mb-2">
                                        <x-label value="Máxima" />
                                        <x-input wire:model.defer="corr_parametro_temp2" type="text" class="w-full" />
                                        <x-input-error for="corr_parametro_temp2"/>
                                    </div>
                                </div>
                                <x-boton-primario wire:click="update_correccion_modo_salida" wire:loading.attr="disabled" wire:target="update_calibrar" class="mb-2 disabled:opacity-25 ml-2">
                                    {{ __('Send Corrección Modo Temperatura') }}
                                </x-boton-primario>
                            @else
                                @if($seleccion_modo_salida == 32)
                                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4 my-0 p-2 rounded">
                                        <div class="mb-2">
                                            <x-label value="Mínima" />
                                            <x-input wire:model.defer="corr_parametro_hum1" type="text" class="w-full" />
                                            <x-input-error for="corr_parametro_hum1"/>
                                        </div>
                                        <div class="mb-2">
                                            <x-label value="Máxima" />
                                            <x-input wire:model.defer="corr_parametro_hum2" type="text" class="w-full" />
                                            <x-input-error for="corr_parametro_hum2"/>
                                        </div>
                                    </div>
                                    <x-boton-primario wire:click="update_modo_salida" wire:loading.attr="disabled" wire:target="update_calibrar" class="mb-2 disabled:opacity-25 ml-2">
                                        {{ __('Send Corrección Modo Humedad 1') }}
                                    </x-boton-primario>
                                @else
                                    @if($seleccion_modo_salida ==48)
                                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4 my-0 p-2 rounded">
                                            <div class="mb-2">
                                                <x-label value="{{ __('Hour') }}" />
                                                <select class="w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-300 rounded-md border border-primary pl-2 pr-2 py-2.5 focus:outline-none sm:text-sm" wire:model="corr_parametro_hora">
                                                    <option value="">Seleccione...</option>
                                                    @foreach ($lista_horas as $hora)
                                                        <option value="{{ $hora->id_hora }}">{{ $hora->horas }}</option>
                                                    @endforeach
                                                </select>
                                                <x-input-error for="corr_parametro_hora" />
                                            </div>
                                            <div class="mb-2">
                                                <x-label value="{{ __('Minutes') }}" />
                                                <select class="w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-300 rounded-md border border-primary pl-2 pr-2 py-2.5 focus:outline-none sm:text-sm" wire:model="corr_parametro_minuto">
                                                    <option value="">Seleccione...</option>
                                                    @foreach ($lista_minutos as $minuto)
                                                        <option value="{{ $minuto->id_minuto }}">{{ $minuto->minutos }}</option>
                                                    @endforeach
                                                </select>
                                                <x-input-error for="corr_parametro_minuto" />
                                            </div>
                                            <div class="mb-2">
                                                <x-label value="{{ __('Hour') }}" />
                                                <select class="w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-300 rounded-md border border-primary pl-2 pr-2 py-2.5 focus:outline-none sm:text-sm" wire:model="corr_parametro_hora2">
                                                    <option value="">Seleccione...</option>
                                                    @foreach ($lista_horas as $hora)
                                                        <option value="{{ $hora->id_hora }}">{{ $hora->horas }}</option>
                                                    @endforeach
                                                </select>
                                                <x-input-error for="corr_parametro_hora2" />
                                            </div>
                                            <div class="mb-2">
                                                <x-label value="{{ __('Minutes') }}" />
                                                <select class="w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-300 rounded-md border border-primary pl-2 pr-2 py-2.5 focus:outline-none sm:text-sm" wire:model="corr_parametro_minuto2">
                                                    <option value="">Seleccione...</option>
                                                    @foreach ($lista_minutos as $minuto)
                                                        <option value="{{ $minuto->id_minuto }}">{{ $minuto->minutos }}</option>
                                                    @endforeach
                                                </select>
                                                <x-input-error for="corr_parametro_minuto2" />
                                            </div>
                                        </div>
                                        <x-boton-primario wire:click="update_correccion_modo_salida" wire:loading.attr="disabled" wire:target="update_calibrar" class="mb-2 disabled:opacity-25 ml-2">
                                            {{ __('Send Corrección Modo Reloj') }}
                                        </x-boton-primario>
                                    @endif
                                @endif
                            @endif
                        @endif
                </x-slot>
                <x-slot name="footer">
                    <x-secondary-button wire:click="$set('open_correccion_salidas_modelo3',false)">
                        {{ __('Cancel') }}
                    </x-secondary-button>
                </x-slot>
            </x-dialog-modal>
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
        
    </x-layouts.menu-franquicia>
</div>