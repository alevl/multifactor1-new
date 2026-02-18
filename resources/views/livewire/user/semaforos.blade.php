<div>
    <x-layouts.menu-user>
        <div class="container">
            <span class="text-2xl font-semi-bold leading-normal">{{ __('Semaforos') }}</span>
            <div class="col-12" style="overflow-x: auto">
                @foreach($semaforos as $semaforo)
                    @if($semaforo->estatus_device == 1)
                        <a wire:click="deshabilitar({{ $semaforo->id }})" class="cursor-pointer font-medium rounded-lg text-xs bg-red-600 hover:bg-red-800 text-white font-bold py-2 px-2 rounded" style="font-size:0.6em">
                            {{ __('Deshabilitar') }}
                        </a>
                    @else
                        <a wire:click="habilitar({{ $semaforo->id }})" class="cursor-pointer font-medium rounded-lg text-xs bg-green-600 hover:bg-green-800 text-white font-bold py-2 px-2 rounded" style="font-size:0.6em">
                            {{ __('Habilitar') }}
                        </a>
                    @endif
                    <h5 class="text-lg font-medium leading-6 text-gray-900 dark:text-white mb-2 mt-4">
                        {{ "Última Actualización : ".$semaforo->updated_at }}
                    </h5>
                    <h5 class="text-lg font-medium leading-6 text-gray-900 dark:text-white mb-2 mt-4">
                        {{ "Chorizo : ".$semaforo->chorizo }}
                    </h5>
                    <div class="grid grid-cols-8 md:grid-cols-8 lg:grid-cols-8 gap-4 my-4 p-2 rounded">
                        @if($semaforo->estatus_device == 1)
                            <div class="w-full">
                                <div class="relative w-full px-4 py-6 bg-white shadow-lg dark:bg-gray-700 rounded">
                                    <div class="container flex flex-col items-center justify-center w-full mx-auto">
                                        <h3 class="text-lg font-medium leading-6 text-gray-900 dark:text-white mb-2">
                                            L1
                                        </h3>
                                        <ul>
                                            @if($semaforo->luz1 == 0)
                                                <li class="mb-2 border-gray-400 text-center">
                                                    <div class="shadow border select-none cursor-pointer bg-white dark:bg-gray-800 rounded-md items-center p-2">
                                                        <div class="items-center justify-center w-6 h-6 text-center">
                                                            <img class="mx-auto object-cover rounded-full h-6 w-6" style="background-color: gray; outline: 5px solid black"/>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="mb-2 border-gray-400 text-center">
                                                    <div class="shadow border select-none cursor-pointer bg-white dark:bg-gray-800 rounded-md items-center p-2">
                                                        <div class="items-center justify-center w-6 h-6 text-center">
                                                            <img class="mx-auto object-cover rounded-full h-6 w-6" style="background-color: gray; outline: 5px solid black"/>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="mb-2 border-gray-400 text-center">
                                                    <div class="shadow border select-none cursor-pointer bg-white dark:bg-gray-800 rounded-md items-center p-2">
                                                        <div class="items-center justify-center w-6 h-6 text-center">
                                                            <img class="mx-auto object-cover rounded-full h-6 w-6" style="background-color: gray; outline: 5px solid black"/>3
                                                        </div>
                                                    </div>
                                                </li>
                                            @else
                                                @if($semaforo->luz1 == 1)
                                                    <li class="mb-2 border-gray-400 text-center">
                                                        <div class="shadow border select-none cursor-pointer bg-white dark:bg-gray-800 rounded-md items-center p-2">
                                                            <div class="items-center justify-center w-6 h-6 text-center">
                                                                <img class="mx-auto object-cover rounded-full h-6 w-6" style="background-color: gray; outline: 5px solid black"/>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="mb-2 border-gray-400 text-center">
                                                        <div class="shadow border select-none cursor-pointer bg-white dark:bg-gray-800 rounded-md items-center p-2">
                                                            <div class="items-center justify-center w-6 h-6 text-center">
                                                                <img class="mx-auto object-cover rounded-full h-6 w-6" style="background-color: gray; outline: 5px solid black"/>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="mb-2 border-gray-400 text-center">
                                                        <div class="shadow border select-none cursor-pointer bg-white dark:bg-gray-800 rounded-md items-center p-2">
                                                            <div class="items-center justify-center w-6 h-6 text-center">
                                                                <img src="{{ asset('storage/sistema/verde.png') }}" class="mx-auto object-cover rounded-full h-6 w-6" />
                                                            </div>
                                                        </div>
                                                    </li>    
                                                @else
                                                    @if($semaforo->luz1 == 2)
                                                        <li class="mb-2 border-gray-400 text-center">
                                                            <div class="shadow border select-none cursor-pointer bg-white dark:bg-gray-800 rounded-md items-center p-2">
                                                                <div class="items-center justify-center w-6 h-6 text-center">
                                                                    <img class="mx-auto object-cover rounded-full h-6 w-6" style="background-color: gray; outline: 5px solid black"/>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="mb-2 border-gray-400 text-center">
                                                            <div class="shadow border select-none cursor-pointer bg-white dark:bg-gray-800 rounded-md items-center p-2">
                                                                <div class="items-center justify-center w-6 h-6 text-center">
                                                                    <img src="{{ asset('storage/sistema/amarillo.png') }}" class="mx-auto object-cover rounded-full h-6 w-6" />

                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="mb-2 border-gray-400 text-center">
                                                            <div class="shadow border select-none cursor-pointer bg-white dark:bg-gray-800 rounded-md items-center p-2">
                                                                <div class="items-center justify-center w-6 h-6 text-center">
                                                                    <img class="mx-auto object-cover rounded-full h-6 w-6" style="background-color: gray; outline: 5px solid black"/>
                                                                </div>
                                                            </div>
                                                        </li>        
                                                    @else
                                                        @if($semaforo->luz1 == 3)
                                                            <li class="mb-2 border-gray-400 text-center">
                                                                <div class="shadow border select-none cursor-pointer bg-white dark:bg-gray-800 rounded-md items-center p-2">
                                                                    <div class="items-center justify-center w-6 h-6 text-center">
                                                                        <img src="{{ asset('storage/sistema/rojo.png') }}" class="mx-auto object-cover rounded-full h-6 w-6" />

                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="mb-2 border-gray-400 text-center">
                                                                <div class="shadow border select-none cursor-pointer bg-white dark:bg-gray-800 rounded-md items-center p-2">
                                                                    <div class="items-center justify-center w-6 h-6 text-center">
                                                                        <img class="mx-auto object-cover rounded-full h-6 w-6" style="background-color: gray; outline: 5px solid black"/>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="mb-2 border-gray-400 text-center">
                                                                <div class="shadow border select-none cursor-pointer bg-white dark:bg-gray-800 rounded-md items-center p-2">
                                                                    <div class="items-center justify-center w-6 h-6 text-center">
                                                                        <img class="mx-auto object-cover rounded-full h-6 w-6" style="background-color: gray; outline: 5px solid black"/>
                                                                    </div>
                                                                </div>
                                                            </li>            
                                                        @endif
                                                    @endif
                                                @endif
                                            @endif           
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full">
                                <div class="relative w-full px-4 py-6 bg-white shadow-lg dark:bg-gray-700 rounded">
                                    <div class="container flex flex-col items-center justify-center w-full mx-auto">
                                        <h3 class="text-lg font-medium leading-6 text-gray-900 dark:text-white mb-2">
                                            L2
                                        </h3>
                                        <ul>
                                            @if($semaforo->luz2 == 0)
                                                <li class="mb-2 border-gray-400 text-center">
                                                    <div class="shadow border select-none cursor-pointer bg-white dark:bg-gray-800 rounded-md items-center p-2">
                                                        <div class="items-center justify-center w-6 h-6 text-center">
                                                            <img class="mx-auto object-cover rounded-full h-6 w-6" style="background-color: gray; outline: 5px solid black"/>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="mb-2 border-gray-400 text-center">
                                                    <div class="shadow border select-none cursor-pointer bg-white dark:bg-gray-800 rounded-md items-center p-2">
                                                        <div class="items-center justify-center w-6 h-6 text-center">
                                                            <img class="mx-auto object-cover rounded-full h-6 w-6" style="background-color: gray; outline: 5px solid black"/>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="mb-2 border-gray-400 text-center">
                                                    <div class="shadow border select-none cursor-pointer bg-white dark:bg-gray-800 rounded-md items-center p-2">
                                                        <div class="items-center justify-center w-6 h-6 text-center">
                                                            <img class="mx-auto object-cover rounded-full h-6 w-6" style="background-color: gray; outline: 5px solid black"/>
                                                        </div>
                                                    </div>
                                                </li>
                                            @else
                                                @if($semaforo->luz2 == 1)
                                                    <li class="mb-2 border-gray-400 text-center">
                                                        <div class="shadow border select-none cursor-pointer bg-white dark:bg-gray-800 rounded-md items-center p-2">
                                                            <div class="items-center justify-center w-6 h-6 text-center">
                                                                <img class="mx-auto object-cover rounded-full h-6 w-6" style="background-color: gray; outline: 5px solid black"/>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="mb-2 border-gray-400 text-center">
                                                        <div class="shadow border select-none cursor-pointer bg-white dark:bg-gray-800 rounded-md items-center p-2">
                                                            <div class="items-center justify-center w-6 h-6 text-center">
                                                                <img class="mx-auto object-cover rounded-full h-6 w-6" style="background-color: gray; outline: 5px solid black"/>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="mb-2 border-gray-400 text-center">
                                                        <div class="shadow border select-none cursor-pointer bg-white dark:bg-gray-800 rounded-md items-center p-2">
                                                            <div class="items-center justify-center w-6 h-6 text-center">
                                                                <img src="{{ asset('storage/sistema/verde.png') }}" class="mx-auto object-cover rounded-full h-6 w-6" />
                                                            </div>
                                                        </div>
                                                    </li>    
                                                @else
                                                    @if($semaforo->luz2 == 2)
                                                        <li class="mb-2 border-gray-400 text-center">
                                                            <div class="shadow border select-none cursor-pointer bg-white dark:bg-gray-800 rounded-md items-center p-2">
                                                                <div class="items-center justify-center w-6 h-6 text-center">
                                                                    <img class="mx-auto object-cover rounded-full h-6 w-6" style="background-color: gray; outline: 5px solid black"/>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="mb-2 border-gray-400 text-center">
                                                            <div class="shadow border select-none cursor-pointer bg-white dark:bg-gray-800 rounded-md items-center p-2">
                                                                <div class="items-center justify-center w-6 h-6 text-center">
                                                                    <img src="{{ asset('storage/sistema/amarillo.png') }}" class="mx-auto object-cover rounded-full h-6 w-6" />

                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="mb-2 border-gray-400 text-center">
                                                            <div class="shadow border select-none cursor-pointer bg-white dark:bg-gray-800 rounded-md items-center p-2">
                                                                <div class="items-center justify-center w-6 h-6 text-center">
                                                                    <img class="mx-auto object-cover rounded-full h-6 w-6" style="background-color: gray; outline: 5px solid black"/>
                                                                </div>
                                                            </div>
                                                        </li>        
                                                    @else
                                                        @if($semaforo->luz2 == 3)
                                                            <li class="mb-2 border-gray-400 text-center">
                                                                <div class="shadow border select-none cursor-pointer bg-white dark:bg-gray-800 rounded-md items-center p-2">
                                                                    <div class="items-center justify-center w-6 h-6 text-center">
                                                                        <img src="{{ asset('storage/sistema/rojo.png') }}" class="mx-auto object-cover rounded-full h-6 w-6" />

                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="mb-2 border-gray-400 text-center">
                                                                <div class="shadow border select-none cursor-pointer bg-white dark:bg-gray-800 rounded-md items-center p-2">
                                                                    <div class="items-center justify-center w-6 h-6 text-center">
                                                                        <img class="mx-auto object-cover rounded-full h-6 w-6" style="background-color: gray; outline: 5px solid black"/>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="mb-2 border-gray-400 text-center">
                                                                <div class="shadow border select-none cursor-pointer bg-white dark:bg-gray-800 rounded-md items-center p-2">
                                                                    <div class="items-center justify-center w-6 h-6 text-center">
                                                                        <img class="mx-auto object-cover rounded-full h-6 w-6" style="background-color: gray; outline: 5px solid black"/>
                                                                    </div>
                                                                </div>
                                                            </li>            
                                                        @endif
                                                    @endif
                                                @endif
                                            @endif           
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full">
                                <div class="relative w-full px-4 py-6 bg-white shadow-lg dark:bg-gray-700 rounded">
                                    <div class="container flex flex-col items-center justify-center w-full mx-auto">
                                        <h3 class="text-lg font-medium leading-6 text-gray-900 dark:text-white mb-2">
                                            L3
                                        </h3>
                                        <ul>
                                            @if($semaforo->luz3 == 0)
                                                <li class="mb-2 border-gray-400 text-center">
                                                    <div class="shadow border select-none cursor-pointer bg-white dark:bg-gray-800 rounded-md items-center p-2">
                                                        <div class="items-center justify-center w-6 h-6 text-center">
                                                            <img class="mx-auto object-cover rounded-full h-6 w-6" style="background-color: gray; outline: 5px solid black"/>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="mb-2 border-gray-400 text-center">
                                                    <div class="shadow border select-none cursor-pointer bg-white dark:bg-gray-800 rounded-md items-center p-2">
                                                        <div class="items-center justify-center w-6 h-6 text-center">
                                                            <img class="mx-auto object-cover rounded-full h-6 w-6" style="background-color: gray; outline: 5px solid black"/>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="mb-2 border-gray-400 text-center">
                                                    <div class="shadow border select-none cursor-pointer bg-white dark:bg-gray-800 rounded-md items-center p-2">
                                                        <div class="items-center justify-center w-6 h-6 text-center">
                                                            <img class="mx-auto object-cover rounded-full h-6 w-6" style="background-color: gray; outline: 5px solid black"/>
                                                        </div>
                                                    </div>
                                                </li>
                                            @else
                                                @if($semaforo->luz3 == 1)
                                                    <li class="mb-2 border-gray-400 text-center">
                                                        <div class="shadow border select-none cursor-pointer bg-white dark:bg-gray-800 rounded-md items-center p-2">
                                                            <div class="items-center justify-center w-6 h-6 text-center">
                                                                <img class="mx-auto object-cover rounded-full h-6 w-6" style="background-color: gray; outline: 5px solid black"/>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="mb-2 border-gray-400 text-center">
                                                        <div class="shadow border select-none cursor-pointer bg-white dark:bg-gray-800 rounded-md items-center p-2">
                                                            <div class="items-center justify-center w-6 h-6 text-center">
                                                                <img class="mx-auto object-cover rounded-full h-6 w-6" style="background-color: gray; outline: 5px solid black"/>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="mb-2 border-gray-400 text-center">
                                                        <div class="shadow border select-none cursor-pointer bg-white dark:bg-gray-800 rounded-md items-center p-2">
                                                            <div class="items-center justify-center w-6 h-6 text-center">
                                                                <img src="{{ asset('storage/sistema/verde.png') }}" class="mx-auto object-cover rounded-full h-6 w-6" />
                                                            </div>
                                                        </div>
                                                    </li>    
                                                @else
                                                    @if($semaforo->luz3 == 2)
                                                        <li class="mb-2 border-gray-400 text-center">
                                                            <div class="shadow border select-none cursor-pointer bg-white dark:bg-gray-800 rounded-md items-center p-2">
                                                                <div class="items-center justify-center w-6 h-6 text-center">
                                                                    <img class="mx-auto object-cover rounded-full h-6 w-6" style="background-color: gray; outline: 5px solid black"/>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="mb-2 border-gray-400 text-center">
                                                            <div class="shadow border select-none cursor-pointer bg-white dark:bg-gray-800 rounded-md items-center p-2">
                                                                <div class="items-center justify-center w-6 h-6 text-center">
                                                                    <img src="{{ asset('storage/sistema/amarillo.png') }}" class="mx-auto object-cover rounded-full h-6 w-6" />

                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="mb-2 border-gray-400 text-center">
                                                            <div class="shadow border select-none cursor-pointer bg-white dark:bg-gray-800 rounded-md items-center p-2">
                                                                <div class="items-center justify-center w-6 h-6 text-center">
                                                                    <img class="mx-auto object-cover rounded-full h-6 w-6" style="background-color: gray; outline: 5px solid black"/>
                                                                </div>
                                                            </div>
                                                        </li>        
                                                    @else
                                                        @if($semaforo->luz3 == 3)
                                                            <li class="mb-2 border-gray-400 text-center">
                                                                <div class="shadow border select-none cursor-pointer bg-white dark:bg-gray-800 rounded-md items-center p-2">
                                                                    <div class="items-center justify-center w-6 h-6 text-center">
                                                                        <img src="{{ asset('storage/sistema/rojo.png') }}" class="mx-auto object-cover rounded-full h-6 w-6" />

                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="mb-2 border-gray-400 text-center">
                                                                <div class="shadow border select-none cursor-pointer bg-white dark:bg-gray-800 rounded-md items-center p-2">
                                                                    <div class="items-center justify-center w-6 h-6 text-center">
                                                                        <img class="mx-auto object-cover rounded-full h-6 w-6" style="background-color: gray; outline: 5px solid black"/>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="mb-2 border-gray-400 text-center">
                                                                <div class="shadow border select-none cursor-pointer bg-white dark:bg-gray-800 rounded-md items-center p-2">
                                                                    <div class="items-center justify-center w-6 h-6 text-center">
                                                                        <img class="mx-auto object-cover rounded-full h-6 w-6" style="background-color: gray; outline: 5px solid black"/>
                                                                    </div>
                                                                </div>
                                                            </li>            
                                                        @endif
                                                    @endif
                                                @endif
                                            @endif           
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full">
                                <div class="relative w-full px-4 py-6 bg-white shadow-lg dark:bg-gray-700 rounded">
                                    <div class="container flex flex-col items-center justify-center w-full mx-auto">
                                        <h3 class="text-lg font-medium leading-6 text-gray-900 dark:text-white mb-2">
                                            L4
                                        </h3>
                                        <ul>
                                            @if($semaforo->luz4 == 0)
                                                <li class="mb-2 border-gray-400 text-center">
                                                    <div class="shadow border select-none cursor-pointer bg-white dark:bg-gray-800 rounded-md items-center p-2">
                                                        <div class="items-center justify-center w-6 h-6 text-center">
                                                            <img class="mx-auto object-cover rounded-full h-6 w-6" style="background-color: gray; outline: 5px solid black"/>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="mb-2 border-gray-400 text-center">
                                                    <div class="shadow border select-none cursor-pointer bg-white dark:bg-gray-800 rounded-md items-center p-2">
                                                        <div class="items-center justify-center w-6 h-6 text-center">
                                                            <img class="mx-auto object-cover rounded-full h-6 w-6" style="background-color: gray; outline: 5px solid black"/>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="mb-2 border-gray-400 text-center">
                                                    <div class="shadow border select-none cursor-pointer bg-white dark:bg-gray-800 rounded-md items-center p-2">
                                                        <div class="items-center justify-center w-6 h-6 text-center">
                                                            <img class="mx-auto object-cover rounded-full h-6 w-6" style="background-color: gray; outline: 5px solid black"/>
                                                        </div>
                                                    </div>
                                                </li>
                                            @else
                                                @if($semaforo->luz4 == 1)
                                                    <li class="mb-2 border-gray-400 text-center">
                                                        <div class="shadow border select-none cursor-pointer bg-white dark:bg-gray-800 rounded-md items-center p-2">
                                                            <div class="items-center justify-center w-6 h-6 text-center">
                                                                <img class="mx-auto object-cover rounded-full h-6 w-6" style="background-color: gray; outline: 5px solid black"/>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="mb-2 border-gray-400 text-center">
                                                        <div class="shadow border select-none cursor-pointer bg-white dark:bg-gray-800 rounded-md items-center p-2">
                                                            <div class="items-center justify-center w-6 h-6 text-center">
                                                                <img class="mx-auto object-cover rounded-full h-6 w-6" style="background-color: gray; outline: 5px solid black"/>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="mb-2 border-gray-400 text-center">
                                                        <div class="shadow border select-none cursor-pointer bg-white dark:bg-gray-800 rounded-md items-center p-2">
                                                            <div class="items-center justify-center w-6 h-6 text-center">
                                                                <img src="{{ asset('storage/sistema/verde.png') }}" class="mx-auto object-cover rounded-full h-6 w-6" />
                                                            </div>
                                                        </div>
                                                    </li>    
                                                @else
                                                    @if($semaforo->luz4 == 2)
                                                        <li class="mb-2 border-gray-400 text-center">
                                                            <div class="shadow border select-none cursor-pointer bg-white dark:bg-gray-800 rounded-md items-center p-2">
                                                                <div class="items-center justify-center w-6 h-6 text-center">
                                                                    <img class="mx-auto object-cover rounded-full h-6 w-6" style="background-color: gray; outline: 5px solid black"/>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="mb-2 border-gray-400 text-center">
                                                            <div class="shadow border select-none cursor-pointer bg-white dark:bg-gray-800 rounded-md items-center p-2">
                                                                <div class="items-center justify-center w-6 h-6 text-center">
                                                                    <img src="{{ asset('storage/sistema/amarillo.png') }}" class="mx-auto object-cover rounded-full h-6 w-6" />

                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="mb-2 border-gray-400 text-center">
                                                            <div class="shadow border select-none cursor-pointer bg-white dark:bg-gray-800 rounded-md items-center p-2">
                                                                <div class="items-center justify-center w-6 h-6 text-center">
                                                                    <img class="mx-auto object-cover rounded-full h-6 w-6" style="background-color: gray; outline: 5px solid black"/>
                                                                </div>
                                                            </div>
                                                        </li>        
                                                    @else
                                                        @if($semaforo->luz4 == 3)
                                                            <li class="mb-2 border-gray-400 text-center">
                                                                <div class="shadow border select-none cursor-pointer bg-white dark:bg-gray-800 rounded-md items-center p-2">
                                                                    <div class="items-center justify-center w-6 h-6 text-center">
                                                                        <img src="{{ asset('storage/sistema/rojo.png') }}" class="mx-auto object-cover rounded-full h-6 w-6" />

                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="mb-2 border-gray-400 text-center">
                                                                <div class="shadow border select-none cursor-pointer bg-white dark:bg-gray-800 rounded-md items-center p-2">
                                                                    <div class="items-center justify-center w-6 h-6 text-center">
                                                                        <img class="mx-auto object-cover rounded-full h-6 w-6" style="background-color: gray; outline: 5px solid black"/>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="mb-2 border-gray-400 text-center">
                                                                <div class="shadow border select-none cursor-pointer bg-white dark:bg-gray-800 rounded-md items-center p-2">
                                                                    <div class="items-center justify-center w-6 h-6 text-center">
                                                                        <img class="mx-auto object-cover rounded-full h-6 w-6" style="background-color: gray; outline: 5px solid black"/>
                                                                    </div>
                                                                </div>
                                                            </li>            
                                                        @endif
                                                    @endif
                                                @endif
                                            @endif           
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full">
                                <div class="relative w-full px-4 py-6 bg-white shadow-lg dark:bg-gray-700 rounded">
                                    <div class="container flex flex-col items-center justify-center w-full mx-auto">
                                        <h3 class="text-lg font-medium leading-6 text-gray-900 dark:text-white mb-2">
                                            L5
                                        </h3>
                                        <ul>
                                            @if($semaforo->luz5 == 0)
                                                <li class="mb-2 border-gray-400 text-center">
                                                    <div class="shadow border select-none cursor-pointer bg-white dark:bg-gray-800 rounded-md items-center p-2">
                                                        <div class="items-center justify-center w-6 h-6 text-center">
                                                            <img class="mx-auto object-cover rounded-full h-6 w-6" style="background-color: gray; outline: 5px solid black"/>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="mb-2 border-gray-400 text-center">
                                                    <div class="shadow border select-none cursor-pointer bg-white dark:bg-gray-800 rounded-md items-center p-2">
                                                        <div class="items-center justify-center w-6 h-6 text-center">
                                                            <img class="mx-auto object-cover rounded-full h-6 w-6" style="background-color: gray; outline: 5px solid black"/>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="mb-2 border-gray-400 text-center">
                                                    <div class="shadow border select-none cursor-pointer bg-white dark:bg-gray-800 rounded-md items-center p-2">
                                                        <div class="items-center justify-center w-6 h-6 text-center">
                                                            <img class="mx-auto object-cover rounded-full h-6 w-6" style="background-color: gray; outline: 5px solid black"/>
                                                        </div>
                                                    </div>
                                                </li>
                                            @else
                                                @if($semaforo->luz5 == 1)
                                                    <li class="mb-2 border-gray-400 text-center">
                                                        <div class="shadow border select-none cursor-pointer bg-white dark:bg-gray-800 rounded-md items-center p-2">
                                                            <div class="items-center justify-center w-6 h-6 text-center">
                                                                <img class="mx-auto object-cover rounded-full h-6 w-6" style="background-color: gray; outline: 5px solid black"/>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="mb-2 border-gray-400 text-center">
                                                        <div class="shadow border select-none cursor-pointer bg-white dark:bg-gray-800 rounded-md items-center p-2">
                                                            <div class="items-center justify-center w-6 h-6 text-center">
                                                                <img class="mx-auto object-cover rounded-full h-6 w-6" style="background-color: gray; outline: 5px solid black"/>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="mb-2 border-gray-400 text-center">
                                                        <div class="shadow border select-none cursor-pointer bg-white dark:bg-gray-800 rounded-md items-center p-2">
                                                            <div class="items-center justify-center w-6 h-6 text-center">
                                                                <img src="{{ asset('storage/sistema/verde.png') }}" class="mx-auto object-cover rounded-full h-6 w-6" />
                                                            </div>
                                                        </div>
                                                    </li>    
                                                @else
                                                    @if($semaforo->luz5 == 2)
                                                        <li class="mb-2 border-gray-400 text-center">
                                                            <div class="shadow border select-none cursor-pointer bg-white dark:bg-gray-800 rounded-md items-center p-2">
                                                                <div class="items-center justify-center w-6 h-6 text-center">
                                                                    <img class="mx-auto object-cover rounded-full h-6 w-6" style="background-color: gray; outline: 5px solid black"/>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="mb-2 border-gray-400 text-center">
                                                            <div class="shadow border select-none cursor-pointer bg-white dark:bg-gray-800 rounded-md items-center p-2">
                                                                <div class="items-center justify-center w-6 h-6 text-center">
                                                                    <img src="{{ asset('storage/sistema/amarillo.png') }}" class="mx-auto object-cover rounded-full h-6 w-6" />

                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="mb-2 border-gray-400 text-center">
                                                            <div class="shadow border select-none cursor-pointer bg-white dark:bg-gray-800 rounded-md items-center p-2">
                                                                <div class="items-center justify-center w-6 h-6 text-center">
                                                                    <img class="mx-auto object-cover rounded-full h-6 w-6" style="background-color: gray; outline: 5px solid black"/>
                                                                </div>
                                                            </div>
                                                        </li>        
                                                    @else
                                                        @if($semaforo->luz5 == 3)
                                                            <li class="mb-2 border-gray-400 text-center">
                                                                <div class="shadow border select-none cursor-pointer bg-white dark:bg-gray-800 rounded-md items-center p-2">
                                                                    <div class="items-center justify-center w-6 h-6 text-center">
                                                                        <img src="{{ asset('storage/sistema/rojo.png') }}" class="mx-auto object-cover rounded-full h-6 w-6" />

                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="mb-2 border-gray-400 text-center">
                                                                <div class="shadow border select-none cursor-pointer bg-white dark:bg-gray-800 rounded-md items-center p-2">
                                                                    <div class="items-center justify-center w-6 h-6 text-center">
                                                                        <img class="mx-auto object-cover rounded-full h-6 w-6" style="background-color: gray; outline: 5px solid black"/>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="mb-2 border-gray-400 text-center">
                                                                <div class="shadow border select-none cursor-pointer bg-white dark:bg-gray-800 rounded-md items-center p-2">
                                                                    <div class="items-center justify-center w-6 h-6 text-center">
                                                                        <img class="mx-auto object-cover rounded-full h-6 w-6" style="background-color: gray; outline: 5px solid black"/>
                                                                    </div>
                                                                </div>
                                                            </li>            
                                                        @endif
                                                    @endif
                                                @endif
                                            @endif           
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full">
                                <div class="relative w-full px-4 py-6 bg-white shadow-lg dark:bg-gray-700 rounded">
                                    <div class="container flex flex-col items-center justify-center w-full mx-auto">
                                        <h3 class="text-lg font-medium leading-6 text-gray-900 dark:text-white mb-2">
                                            L6
                                        </h3>
                                        <ul>
                                            @if($semaforo->luz6 == 0)
                                                <li class="mb-2 border-gray-400 text-center">
                                                    <div class="shadow border select-none cursor-pointer bg-white dark:bg-gray-800 rounded-md items-center p-2">
                                                        <div class="items-center justify-center w-6 h-6 text-center">
                                                            <img class="mx-auto object-cover rounded-full h-6 w-6" style="background-color: gray; outline: 5px solid black"/>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="mb-2 border-gray-400 text-center">
                                                    <div class="shadow border select-none cursor-pointer bg-white dark:bg-gray-800 rounded-md items-center p-2">
                                                        <div class="items-center justify-center w-6 h-6 text-center">
                                                            <img class="mx-auto object-cover rounded-full h-6 w-6" style="background-color: gray; outline: 5px solid black"/>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="mb-2 border-gray-400 text-center">
                                                    <div class="shadow border select-none cursor-pointer bg-white dark:bg-gray-800 rounded-md items-center p-2">
                                                        <div class="items-center justify-center w-6 h-6 text-center">
                                                            <img class="mx-auto object-cover rounded-full h-6 w-6" style="background-color: gray; outline: 5px solid black"/>
                                                        </div>
                                                    </div>
                                                </li>
                                            @else
                                                @if($semaforo->luz6 == 1)
                                                    <li class="mb-2 border-gray-400 text-center">
                                                        <div class="shadow border select-none cursor-pointer bg-white dark:bg-gray-800 rounded-md items-center p-2">
                                                            <div class="items-center justify-center w-6 h-6 text-center">
                                                                <img class="mx-auto object-cover rounded-full h-6 w-6" style="background-color: gray; outline: 5px solid black"/>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="mb-2 border-gray-400 text-center">
                                                        <div class="shadow border select-none cursor-pointer bg-white dark:bg-gray-800 rounded-md items-center p-2">
                                                            <div class="items-center justify-center w-6 h-6 text-center">
                                                                <img class="mx-auto object-cover rounded-full h-6 w-6" style="background-color: gray; outline: 5px solid black"/>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="mb-2 border-gray-400 text-center">
                                                        <div class="shadow border select-none cursor-pointer bg-white dark:bg-gray-800 rounded-md items-center p-2">
                                                            <div class="items-center justify-center w-6 h-6 text-center">
                                                                <img src="{{ asset('storage/sistema/verde.png') }}" class="mx-auto object-cover rounded-full h-6 w-6" />
                                                            </div>
                                                        </div>
                                                    </li>    
                                                @else
                                                    @if($semaforo->luz6 == 2)
                                                        <li class="mb-2 border-gray-400 text-center">
                                                            <div class="shadow border select-none cursor-pointer bg-white dark:bg-gray-800 rounded-md items-center p-2">
                                                                <div class="items-center justify-center w-6 h-6 text-center">
                                                                    <img class="mx-auto object-cover rounded-full h-6 w-6" style="background-color: gray; outline: 5px solid black"/>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="mb-2 border-gray-400 text-center">
                                                            <div class="shadow border select-none cursor-pointer bg-white dark:bg-gray-800 rounded-md items-center p-2">
                                                                <div class="items-center justify-center w-6 h-6 text-center">
                                                                    <img src="{{ asset('storage/sistema/amarillo.png') }}" class="mx-auto object-cover rounded-full h-6 w-6" />

                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="mb-2 border-gray-400 text-center">
                                                            <div class="shadow border select-none cursor-pointer bg-white dark:bg-gray-800 rounded-md items-center p-2">
                                                                <div class="items-center justify-center w-6 h-6 text-center">
                                                                    <img class="mx-auto object-cover rounded-full h-6 w-6" style="background-color: gray; outline: 5px solid black"/>
                                                                </div>
                                                            </div>
                                                        </li>        
                                                    @else
                                                        @if($semaforo->luz6 == 3)
                                                            <li class="mb-2 border-gray-400 text-center">
                                                                <div class="shadow border select-none cursor-pointer bg-white dark:bg-gray-800 rounded-md items-center p-2">
                                                                    <div class="items-center justify-center w-6 h-6 text-center">
                                                                        <img src="{{ asset('storage/sistema/rojo.png') }}" class="mx-auto object-cover rounded-full h-6 w-6" />

                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="mb-2 border-gray-400 text-center">
                                                                <div class="shadow border select-none cursor-pointer bg-white dark:bg-gray-800 rounded-md items-center p-2">
                                                                    <div class="items-center justify-center w-6 h-6 text-center">
                                                                        <img class="mx-auto object-cover rounded-full h-6 w-6" style="background-color: gray; outline: 5px solid black"/>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="mb-2 border-gray-400 text-center">
                                                                <div class="shadow border select-none cursor-pointer bg-white dark:bg-gray-800 rounded-md items-center p-2">
                                                                    <div class="items-center justify-center w-6 h-6 text-center">
                                                                        <img class="mx-auto object-cover rounded-full h-6 w-6" style="background-color: gray; outline: 5px solid black"/>
                                                                    </div>
                                                                </div>
                                                            </li>            
                                                        @endif
                                                    @endif
                                                @endif
                                            @endif           
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full">
                                <div class="relative w-full px-4 py-6 bg-white shadow-lg dark:bg-gray-700 rounded">
                                    <div class="container flex flex-col items-center justify-center w-full mx-auto">
                                        <h3 class="text-lg font-medium leading-6 text-gray-900 dark:text-white mb-2">
                                            L7
                                        </h3>
                                        <ul>
                                            @if($semaforo->luz7 == 0)
                                                <li class="mb-2 border-gray-400 text-center">
                                                    <div class="shadow border select-none cursor-pointer bg-white dark:bg-gray-800 rounded-md items-center p-2">
                                                        <div class="items-center justify-center w-6 h-6 text-center">
                                                            <img class="mx-auto object-cover rounded-full h-6 w-6" style="background-color: gray; outline: 5px solid black"/>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="mb-2 border-gray-400 text-center">
                                                    <div class="shadow border select-none cursor-pointer bg-white dark:bg-gray-800 rounded-md items-center p-2">
                                                        <div class="items-center justify-center w-6 h-6 text-center">
                                                            <img class="mx-auto object-cover rounded-full h-6 w-6" style="background-color: gray; outline: 5px solid black"/>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="mb-2 border-gray-400 text-center">
                                                    <div class="shadow border select-none cursor-pointer bg-white dark:bg-gray-800 rounded-md items-center p-2">
                                                        <div class="items-center justify-center w-6 h-6 text-center">
                                                            <img class="mx-auto object-cover rounded-full h-6 w-6" style="background-color: gray; outline: 5px solid black"/>
                                                        </div>
                                                    </div>
                                                </li>
                                            @else
                                                @if($semaforo->luz7 == 1)
                                                    <li class="mb-2 border-gray-400 text-center">
                                                        <div class="shadow border select-none cursor-pointer bg-white dark:bg-gray-800 rounded-md items-center p-2">
                                                            <div class="items-center justify-center w-6 h-6 text-center">
                                                                <img class="mx-auto object-cover rounded-full h-6 w-6" style="background-color: gray; outline: 5px solid black"/>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="mb-2 border-gray-400 text-center">
                                                        <div class="shadow border select-none cursor-pointer bg-white dark:bg-gray-800 rounded-md items-center p-2">
                                                            <div class="items-center justify-center w-6 h-6 text-center">
                                                                <img class="mx-auto object-cover rounded-full h-6 w-6" style="background-color: gray; outline: 5px solid black"/>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="mb-2 border-gray-400 text-center">
                                                        <div class="shadow border select-none cursor-pointer bg-white dark:bg-gray-800 rounded-md items-center p-2">
                                                            <div class="items-center justify-center w-6 h-6 text-center">
                                                                <img src="{{ asset('storage/sistema/verde.png') }}" class="mx-auto object-cover rounded-full h-6 w-6" />
                                                            </div>
                                                        </div>
                                                    </li>    
                                                @else
                                                    @if($semaforo->luz7 == 2)
                                                        <li class="mb-2 border-gray-400 text-center">
                                                            <div class="shadow border select-none cursor-pointer bg-white dark:bg-gray-800 rounded-md items-center p-2">
                                                                <div class="items-center justify-center w-6 h-6 text-center">
                                                                    <img class="mx-auto object-cover rounded-full h-6 w-6" style="background-color: gray; outline: 5px solid black"/>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="mb-2 border-gray-400 text-center">
                                                            <div class="shadow border select-none cursor-pointer bg-white dark:bg-gray-800 rounded-md items-center p-2">
                                                                <div class="items-center justify-center w-6 h-6 text-center">
                                                                    <img src="{{ asset('storage/sistema/amarillo.png') }}" class="mx-auto object-cover rounded-full h-6 w-6" />

                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="mb-2 border-gray-400 text-center">
                                                            <div class="shadow border select-none cursor-pointer bg-white dark:bg-gray-800 rounded-md items-center p-2">
                                                                <div class="items-center justify-center w-6 h-6 text-center">
                                                                    <img class="mx-auto object-cover rounded-full h-6 w-6" style="background-color: gray; outline: 5px solid black"/>
                                                                </div>
                                                            </div>
                                                        </li>        
                                                    @else
                                                        @if($semaforo->luz7 == 3)
                                                            <li class="mb-2 border-gray-400 text-center">
                                                                <div class="shadow border select-none cursor-pointer bg-white dark:bg-gray-800 rounded-md items-center p-2">
                                                                    <div class="items-center justify-center w-6 h-6 text-center">
                                                                        <img src="{{ asset('storage/sistema/rojo.png') }}" class="mx-auto object-cover rounded-full h-6 w-6" />

                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="mb-2 border-gray-400 text-center">
                                                                <div class="shadow border select-none cursor-pointer bg-white dark:bg-gray-800 rounded-md items-center p-2">
                                                                    <div class="items-center justify-center w-6 h-6 text-center">
                                                                        <img class="mx-auto object-cover rounded-full h-6 w-6" style="background-color: gray; outline: 5px solid black"/>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="mb-2 border-gray-400 text-center">
                                                                <div class="shadow border select-none cursor-pointer bg-white dark:bg-gray-800 rounded-md items-center p-2">
                                                                    <div class="items-center justify-center w-6 h-6 text-center">
                                                                        <img class="mx-auto object-cover rounded-full h-6 w-6" style="background-color: gray; outline: 5px solid black"/>
                                                                    </div>
                                                                </div>
                                                            </li>            
                                                        @endif
                                                    @endif
                                                @endif
                                            @endif           
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full">
                                <div class="relative w-full px-4 py-6 bg-white shadow-lg dark:bg-gray-700 rounded">
                                    <div class="container flex flex-col items-center justify-center w-full mx-auto">
                                        <h3 class="text-lg font-medium leading-6 text-gray-900 dark:text-white mb-2">
                                            L8
                                        </h3>
                                        <ul>
                                            @if($semaforo->luz8 == 0)
                                                <li class="mb-2 border-gray-400 text-center">
                                                    <div class="shadow border select-none cursor-pointer bg-white dark:bg-gray-800 rounded-md items-center p-2">
                                                        <div class="items-center justify-center w-6 h-6 text-center">
                                                            <img class="mx-auto object-cover rounded-full h-6 w-6" style="background-color: gray; outline: 5px solid black"/>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="mb-2 border-gray-400 text-center">
                                                    <div class="shadow border select-none cursor-pointer bg-white dark:bg-gray-800 rounded-md items-center p-2">
                                                        <div class="items-center justify-center w-6 h-6 text-center">
                                                            <img class="mx-auto object-cover rounded-full h-6 w-6" style="background-color: gray; outline: 5px solid black"/>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="mb-2 border-gray-400 text-center">
                                                    <div class="shadow border select-none cursor-pointer bg-white dark:bg-gray-800 rounded-md items-center p-2">
                                                        <div class="items-center justify-center w-6 h-6 text-center">
                                                            <img class="mx-auto object-cover rounded-full h-6 w-6" style="background-color: gray; outline: 5px solid black"/>
                                                        </div>
                                                    </div>
                                                </li>
                                            @else
                                                @if($semaforo->luz8 == 1)
                                                    <li class="mb-2 border-gray-400 text-center">
                                                        <div class="shadow border select-none cursor-pointer bg-white dark:bg-gray-800 rounded-md items-center p-2">
                                                            <div class="items-center justify-center w-6 h-6 text-center">
                                                                <img class="mx-auto object-cover rounded-full h-6 w-6" style="background-color: gray; outline: 5px solid black"/>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="mb-2 border-gray-400 text-center">
                                                        <div class="shadow border select-none cursor-pointer bg-white dark:bg-gray-800 rounded-md items-center p-2">
                                                            <div class="items-center justify-center w-6 h-6 text-center">
                                                                <img class="mx-auto object-cover rounded-full h-6 w-6" style="background-color: gray; outline: 5px solid black"/>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="mb-2 border-gray-400 text-center">
                                                        <div class="shadow border select-none cursor-pointer bg-white dark:bg-gray-800 rounded-md items-center p-2">
                                                            <div class="items-center justify-center w-6 h-6 text-center">
                                                                <img src="{{ asset('storage/sistema/verde.png') }}" class="mx-auto object-cover rounded-full h-6 w-6" />
                                                            </div>
                                                        </div>
                                                    </li>    
                                                @else
                                                    @if($semaforo->luz8 == 2)
                                                        <li class="mb-2 border-gray-400 text-center">
                                                            <div class="shadow border select-none cursor-pointer bg-white dark:bg-gray-800 rounded-md items-center p-2">
                                                                <div class="items-center justify-center w-6 h-6 text-center">
                                                                    <img class="mx-auto object-cover rounded-full h-6 w-6" style="background-color: gray; outline: 5px solid black"/>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="mb-2 border-gray-400 text-center">
                                                            <div class="shadow border select-none cursor-pointer bg-white dark:bg-gray-800 rounded-md items-center p-2">
                                                                <div class="items-center justify-center w-6 h-6 text-center">
                                                                    <img src="{{ asset('storage/sistema/amarillo.png') }}" class="mx-auto object-cover rounded-full h-6 w-6" />

                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="mb-2 border-gray-400 text-center">
                                                            <div class="shadow border select-none cursor-pointer bg-white dark:bg-gray-800 rounded-md items-center p-2">
                                                                <div class="items-center justify-center w-6 h-6 text-center">
                                                                    <img class="mx-auto object-cover rounded-full h-6 w-6" style="background-color: gray; outline: 5px solid black"/>
                                                                </div>
                                                            </div>
                                                        </li>        
                                                    @else
                                                        @if($semaforo->luz8 == 3)
                                                            <li class="mb-2 border-gray-400 text-center">
                                                                <div class="shadow border select-none cursor-pointer bg-white dark:bg-gray-800 rounded-md items-center p-2">
                                                                    <div class="items-center justify-center w-6 h-6 text-center">
                                                                        <img src="{{ asset('storage/sistema/rojo.png') }}" class="mx-auto object-cover rounded-full h-6 w-6" />

                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="mb-2 border-gray-400 text-center">
                                                                <div class="shadow border select-none cursor-pointer bg-white dark:bg-gray-800 rounded-md items-center p-2">
                                                                    <div class="items-center justify-center w-6 h-6 text-center">
                                                                        <img class="mx-auto object-cover rounded-full h-6 w-6" style="background-color: gray; outline: 5px solid black"/>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="mb-2 border-gray-400 text-center">
                                                                <div class="shadow border select-none cursor-pointer bg-white dark:bg-gray-800 rounded-md items-center p-2">
                                                                    <div class="items-center justify-center w-6 h-6 text-center">
                                                                        <img class="mx-auto object-cover rounded-full h-6 w-6" style="background-color: gray; outline: 5px solid black"/>
                                                                    </div>
                                                                </div>
                                                            </li>            
                                                        @endif
                                                    @endif
                                                @endif
                                            @endif           
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="w-full text-center">
                                <div class="text-2xl font-semi-bold leading-normal">{{ __('Sistema Deshabilitado') }}</div>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
        
        <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    </x-layouts.menu-user>
</div>
