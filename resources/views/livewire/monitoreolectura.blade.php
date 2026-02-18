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
    public $maquinas=[];
    public $maquinas_salidas=[];

    public function mount()
    {
        $this->maquinas = Maquina::where('usuario_lectura', auth()->user()->id)->orderBy('id', 'desc')->get();
        $this->maquinas_salidas = MaquinasSalida::orderBy('maquina_id', 'asc')->get();

        json_decode($this->maquinas);
        json_decode($this->maquinas_salidas);
    }

    #[On('echo-private:messages,MessageSent')]
    public function onMessageSent($event)
    {
        $this->maquinas = Maquina::where('usuario_lectura', auth()->user()->id)->orderBy('id', 'desc')->get();
        $this->maquinas_salidas = MaquinasSalida::orderBy('maquina_id', 'asc')->get();
        json_decode($this->maquinas);
        json_decode($this->maquinas_salidas);
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
                                    </button>
                                </div>
                            </div>
                            @foreach($maquinas_salidas as $sal)
                                @if($sal->maquina_id == $maq->id)
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
                                                <span class="badge p-0.5 pl-1 pr-1 rounded" style="background-color: #a9dfbf; color: #186a3b; font-size:0.6em; margin-top:5px">
                                                    {{ __('ON') }}
                                                </span>
                                            @else
                                                <span class="badge p-0.5 pl-1 pr-1 rounded" style="background-color: #f9e79f; color: #9a7d0a; font-size:0.6em; margin-top:5px">
                                                    {{ __('OFF') }}
                                                </span>
                                            @endif
                                        </p>
                                        <button class="p-1 mr-0 text-sm text-gray-400">
                                        </button>
                                    </div>
                                    <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-0 p-0 rounded">
                                        <span class="ml-0 text-xs text-gray-500 dark:text-white">
                                            {{ __('Last update') }} {{ ": ".date("d/m/Y H:i:s",strtotime($sal->updated_at)) }}
                                        </span>
                                    </div>

                                    @if($sal->uno == 69)
                                        @php
                                        $resultado = 0;
                                        $letra=$sal->uno;
                                        @endphp
                                    @else
                                        @if($sal->uno == 86)
                                            @php
                                            $letra="V";
                                            @endphp
                                        @else
                                            @php
                                            $letra=$sal->uno;
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
    </div>
</div>