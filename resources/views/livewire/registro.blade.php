<div class="p-6">
    <script src="https://cdn.tailwindcss.com"></script>
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 bg-white shadow mb-12">
        <div class="px-4 sm:px-0">
            <h3 class="text-base font-semibold leading-7 text-gray-900">{{ __('Device Information') }}</h3>
        </div>
        @if($maquina->maquina_registrada == 0)
            <div class="mt-6 border-t border-gray-100">
                <dl class="divide-y divide-gray-100">
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Machine ID</dt>
                        <dd class="mt-1 text-sm leading-6 texto-primero font-bold sm:col-span-2 sm:mt-0">{{ $maquina->id_maquina }}</dd>
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Number of Outputs</dt>
                        <dd class="mt-1 text-sm leading-6 texto-primero font-bold sm:col-span-2 sm:mt-0">{{ $maquina->numero_salidas }}</dd>
                    </div>
                </dl>
            </div>
            <div class="px-4 sm:px-0 mt-6 border-t border-gray-100 pt-6">
                <h3 class="text-base font-semibold leading-7 text-gray-900">Machine</h3>
                <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-500">Please record the machine data and outputs, this information may be modified later.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4 my-4 p-2 rounded">
                <div class="mb-4">
                    <x-label value="{{ __('Registered User (Username)') }}" />
                    <x-input wire:model.defer="nickname" type="text" class="w-full" />
                    <x-input-error for="nickname"/>
                </div>
                <div class="mb-4">
                    <x-label value="{{ __('Nickname of the Machine') }}" />
                    <x-input wire:model.defer="nombre_maquina" type="text" class="w-full" />
                    <x-input-error for="nombre_maquina"/>
                </div>
            </div>
            <div class="px-4 sm:px-0 mt-6 border-t border-gray-100 pt-6">
                <h3 class="text-base font-semibold leading-7 text-gray-900">Outpus</h3>
                <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-500">Please record the name of each output, this information may be modified later.</p>
            </div>
            @if($maquina->numero_salidas == 1)

            @else
                @if($maquina->numero_salidas == 2)

                @else
                    @if($maquina->numero_salidas == 3)

                    @else
                        @if($maquina->numero_salidas == 4)

                        @else
                            @if($maquina->numero_salidas == 5)
                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4 my-4 p-2 rounded">
                                    <div class="mb-4">
                                        <x-label value="{{ __('Nickname of the Output 1') }}" />
                                        <x-input wire:model.defer="nombre_salida1" type="text" class="w-full" />
                                        <x-input-error for="nombre_salida1"/>
                                    </div>
                                    <div class="mb-4">
                                        <x-label value="{{ __('Nickname of the Output 2') }}" />
                                        <x-input wire:model.defer="nombre_salida2" type="text" class="w-full" />
                                        <x-input-error for="nombre_salida2"/>
                                    </div>
                                    <div class="mb-4">
                                        <x-label value="{{ __('Nickname of the Output 3') }}" />
                                        <x-input wire:model.defer="nombre_salida3" type="text" class="w-full" />
                                        <x-input-error for="nombre_salida3"/>
                                    </div>
                                    <div class="mb-4">
                                        <x-label value="{{ __('Nickname of the Output 4') }}" />
                                        <x-input wire:model.defer="nombre_salida4" type="text" class="w-full" />
                                        <x-input-error for="nombre_salida4"/>
                                    </div>
                                    <div class="mb-4">
                                        <x-label value="{{ __('Nickname of the Output 5') }}" />
                                        <x-input wire:model.defer="nombre_salida5" type="text" class="w-full" />
                                        <x-input-error for="nombre_salida5"/>
                                    </div>
                                </div>
                                <x-boton-primario wire:click="grabar" wire:loading.attr="disabled" class="disabled:opacity-25 ml-2 bg-primary text-white p-2 mb-6 w-full py-4 ">
                                    {{ __('Register Information') }}
                                </x-boton-primario>
                            @endif
                        @endif
                    @endif
                @endif
            @endif
        @else        
            <div class="dark:bg-gray-800 mt-4 fondo-primero">
                <div class="px-3 py-3 mx-auto sm:px-6 lg:px-8">
                    <div class="flex-wrap items-center justify-between">
                        <div class="flex items-center flex-1 w-full">
                            <span class="p-2 fondo-segundo rounded-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="w-6 h-6 text-white" viewBox="0 0 1792 1792">
                                    <path d="M1024 1375v-190q0-14-9.5-23.5t-22.5-9.5h-192q-13 0-22.5 9.5t-9.5 23.5v190q0 14 9.5 23.5t22.5 9.5h192q13 0 22.5-9.5t9.5-23.5zm-2-374l18-459q0-12-10-19-13-11-24-11h-220q-11 0-24 11-10 7-10 21l17 457q0 10 10 16.5t24 6.5h185q14 0 23.5-6.5t10.5-16.5zm-14-934l768 1408q35 63-2 126-17 29-46.5 46t-63.5 17h-1536q-34 0-63.5-17t-46.5-46q-37-63-2-126l768-1408q17-31 47-49t65-18 65 18 47 49z">
                                    </path>
                                </svg>
                            </span>
                            <p class="ml-3 font-medium text-white">
                                <span class="font-bold">
                                    {{ __('Registered machine:') }}
                                </span>
                                <span class="md:inline">
                                    {{ __('If you register it, you can track it by logging into the system; If it does not register, contact your provider to solve the problem.') }}
                                </span>
                            </p>
                        </div>
                        <div class="mt 4 flex-shrink-0 order-3 w-full mt-2 sm:order-2 sm:mt-0 sm:w-auto">
                        </div>
                        <div class="text-center mt-6" style="width:100px; margin:auto">
                            <a href="https://wa.me/+584241906854?text=hello, " target="_blank" class="flex items-center justify-center px-4 py-2 text-sm font-medium text-pink-600 bg-white border border-transparent rounded-md shadow-sm dark:text-gray-800 hover:bg-pink-50">
                                Support
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
