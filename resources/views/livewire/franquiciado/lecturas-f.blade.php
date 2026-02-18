<div>
    <x-layouts.menu-franquicia>
        <div class="container">
            <span class="text-2xl font-semi-bold leading-normal">{{ __('Data') }}</span>
            <div class="col-12" style="overflow-x: auto">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4 my-4 p-2 rounded">
                    @foreach($maquinas as $maq)
                        <div class="w-full">
                            <div class="mt-2 relative w-full px-4 py-6 bg-white shadow-lg dark:bg-gray-700 rounded" style="height: 500px; overflow-x: auto;">
                                <div class="text-xs texto-primero font-semibold mb-2">{{ "ID ".$maq->id_maquina." - ".$maq->nombre }}</div>
                                <table class="w-full min-w-max">
                                    <thead>
                                        <tr class="text-center">
                                        <th class="p-0">
                                            <div class="py-3 px-2 rounded-l-xl fondo-primero"><span class="text-xs font-semibold text-white">Fecha</span></div>
                                        </th>
                                        <th class="p-0">
                                            <div class="py-3 px-2 fondo-primero"><span class="text-xs text-white font-semibold">Hora</span></div>
                                        </th>
                                        <th class="p-0">
                                            <div class="py-3 px-2 fondo-primero"><span class="text-xs text-white font-semibold">Temperatura</span></div>
                                        </th>
                                        <th class="p-0">
                                            <div class="py-3 px-2 fondo-primero rounded-r-xl"><span class="text-xs text-white font-semibold">Humedad</span></div>
                                        </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $n=0 @endphp
                                        @foreach($lecturas as $lec)
                                            @if($maq->id == $lec->maquina)
                                                @if($n==0)
                                                    @php $n=1 @endphp
                                                    <tr>
                                                        <td class="p-0 text-center">
                                                            <div class="h-8 p-2">
                                                            <h5 class="text-sm font-medium text-xs texto-blanco">{{ $lec->fecha }}</h5>
                                                            </div>
                                                        </td>
                                                        <td class="p-0 text-center">
                                                            <div class="h-8 p-2">
                                                            <h5 class="text-sm font-medium text-xs texto-blanco">{{ $lec->hora }}</h5>
                                                            </div>
                                                        </td>
                                                        <td class="p-0 text-center">
                                                            <div class="h-8 p-2">
                                                            <h5 class="text-sm font-medium text-xs texto-blanco">{{ $lec->temperatura." °C" }}</h5>
                                                            </div>
                                                        </td>
                                                        <td class="p-0 text-center">
                                                            <div class="h-8 p-2">
                                                            <h5 class="text-sm font-medium text-xs texto-blanco">{{ $lec->humedad." RH%" }}</h5>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @else
                                                    @php $n=0 @endphp
                                                    <tr style="background-color: #f2f3f4">
                                                        <td class="p-0 text-center">
                                                            <div class="h-8 p-2">
                                                            <h5 class="text-sm font-medium text-xs texto-blanco">{{ $lec->fecha }}</h5>
                                                            </div>
                                                        </td>
                                                        <td class="p-0 text-center">
                                                            <div class="h-8 p-2">
                                                            <h5 class="text-sm font-medium text-xs texto-blanco">{{ $lec->hora }}</h5>
                                                            </div>
                                                        </td>
                                                        <td class="p-0 text-center">
                                                            <div class="h-8 p-2">
                                                            <h5 class="text-sm font-medium text-xs texto-blanco">{{ $lec->temperatura." °C" }}</h5>
                                                            </div>
                                                        </td>
                                                        <td class="p-0 text-center">
                                                            <div class="h-8 p-2">
                                                            <h5 class="text-sm font-medium text-xs texto-blanco">{{ $lec->humedad." RH%" }}</h5>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </x-layouts.menu-franquicia>
</div>