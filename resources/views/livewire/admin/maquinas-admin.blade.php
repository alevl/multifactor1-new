<div>
    <x-layouts.menu-admin>
        <div class="container">
            <span class="text-2xl font-semi-bold leading-normal">{{ __('Machines') }}</span>
            <div class="w-full flex mb-4 mt-2">
                <x-boton-primario wire:click="$set('open_crear', true)">
                    {{ __('New Machine') }}
                </x-boton-primario>
            </div>
            <div class="col-12" style="overflow-x: auto">
                <div class="w-full">
                    <x-input type="text" wire:model.live="search" class="w-full border border-primary border py-2 rounded focus:outline-none" placeholder="{{ __('Search') }}" />
                </div>
                <div class="py-2 flex items-center">
                    <div class="flex items-center">
                        <span class="text-s" style="font-size: 0.9em">{{ __('Show') }}</span>
                        <select wire:model.live="cant" style="font-size: 0.9em" class="ml-2 rounded-md border border-primary b-transparent bg-none pl-2 pr-2 py-2 focus:outline-none sm:text-sm text-center">
                            <option value="50">50</option>
                            <option value="80">80</option>
                            <option value="100">100</option>
                          </select>
                        <span class="ml-2 text-s" style="font-size: 0.9em">{{ __('Records') }}</span>
                    </div>
                </div>
                <table class="w-full mt-4 table bg-white rounded-lg shadow mb-12" style="font-size: 0.8em">
                    <thead>
                        <tr>
                            <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center" style="cursor:pointer" wire:click="order('id_maquina')">
                                ID
                                @if($sort == 'id_maquina')
                                    @if($direccion == 'asc')
                                        <i class="icofont icofont-caret-up float-right" style="font-size: 1.3em"></i>
                                    @else
                                        <i class="icofont icofont-caret-down float-right" style="font-size: 1.3em"></i>
                                    @endif
                                @else
                                    <i class="icofont icofont-sort float-right mt-1"></i>
                                @endif
                            </th>
                            <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center" style="cursor:pointer" wire:click="order('modelo')">
                                Modelo
                                @if($sort == 'modelo')
                                    @if($direccion == 'asc')
                                        <i class="icofont icofont-caret-up float-right" style="font-size: 1.3em"></i>
                                    @else
                                        <i class="icofont icofont-caret-down float-right" style="font-size: 1.3em"></i>
                                    @endif
                                @else
                                    <i class="icofont icofont-sort float-right mt-1"></i>
                                @endif
                            </th>
                            <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center" style="cursor:pointer" wire:click="order('numero_salidas')">
                                {{ __('Outpus') }}
                                @if($sort == 'numero_salidas')
                                    @if($direccion == 'asc')
                                        <i class="icofont icofont-caret-up float-right" style="font-size: 1.3em"></i>
                                    @else
                                        <i class="icofont icofont-caret-down float-right" style="font-size: 1.3em"></i>
                                    @endif
                                @else
                                    <i class="icofont icofont-sort float-right mt-1"></i>
                                @endif
                            </th>
                            <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center" style="cursor:pointer" wire:click="order('usuario_id')">
                                {{ __('Client') }}
                                @if($sort == 'usuario_id')
                                    @if($direccion == 'asc')
                                        <i class="icofont icofont-caret-up float-right" style="font-size: 1.3em"></i>
                                    @else
                                        <i class="icofont icofont-caret-down float-right" style="font-size: 1.3em"></i>
                                    @endif
                                @else
                                    <i class="icofont icofont-sort float-right mt-1"></i>
                                @endif
                            </th>
                            <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center" style="cursor:pointer" wire:click="order('propietario_id')">
                                {{ __('Owner') }}
                                @if($sort == 'propietario_id')
                                    @if($direccion == 'asc')
                                        <i class="icofont icofont-caret-up float-right" style="font-size: 1.3em"></i>
                                    @else
                                        <i class="icofont icofont-caret-down float-right" style="font-size: 1.3em"></i>
                                    @endif
                                @else
                                    <i class="icofont icofont-sort float-right mt-1"></i>
                                @endif
                            </th>
                            <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center">
                                QR
                            </th>
                            <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center" style="cursor:pointer" wire:click="order('created_at')">
                                {{ __('Registration Date') }}
                                @if($sort == 'created_at')
                                    @if($direccion == 'asc')
                                        <i class="icofont icofont-caret-up float-right" style="font-size: 1.3em"></i>
                                    @else
                                        <i class="icofont icofont-caret-down float-right" style="font-size: 1.3em"></i>
                                    @endif
                                @else
                                    <i class="icofont icofont-sort float-right mt-1"></i>
                                @endif
                            </th>
                            <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center">
                                {{ __('Action') }}
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($maquinas as $datos_maq)
                            <tr class="text-gray-700">
                                <td class="border-b-2 p-2 dark:border-dark-5 text-center">
                                    {{ $datos_maq->id_maquina }}
                                </td>
                                <td class="border-b-2 p-2 dark:border-dark-5 text-center">
                                    {{ $datos_maq->modelo }}
                                </td>
                                <td class="border-b-2 p-2 dark:border-dark-5 text-center">
                                    {{ $datos_maq->numero_salidas }}
                                </td>
                                <td class="border-b-2 p-2 dark:border-dark-5 text-center">
                                    {{ $datos_maq->maquina_usuario->name }}
                                </td>
                                <td class="border-b-2 p-2 dark:border-dark-5 text-center">
                                    {{ $datos_maq->maquina_propietario->name }}
                                </td>
                                <td class="border-b-2 p-2 dark:border-dark-5 text-center">
                                    <a href="{{ route('imprimirqr', $datos_maq->id_maquina)}}" target="new" style="text-decoration:underline">Print QR</a>
                                </td>
                                <td class="border-b-2 p-2 dark:border-dark-5 text-center">
                                    {{ date("d/m/Y", strtotime($datos_maq->created_at)) }}
                                </td>
                                <td class="border-b-2 p-2 dark:border-dark-5 text-center">
                                    <a wire:click="edit({{ $datos_maq }})" class="cursor-pointer" title="{{ __('Machine edit') }}"><i class="icofont icofont-edit-alt texto-azul" style="font-size: 1.3em"></i></a>
                                    <a wire:click="$dispatch('eliminar', {{ $datos_maq->id }})" class="cursor-pointer" title="{{ __('Delete machine') }}"><i class="icofont icofont-bin texto-rojo" style="font-size: 1.3em"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @if($maquinas->hasPages())
                <div class="px-6 py-3">
                    {{ $maquinas->links() }}
                </div>                    
            @endif
        </div>
        <x-dialog-modal wire:model="open_edit">
            <x-slot name="title">
                {{ __('Machine') }}
            </x-slot>
            <x-slot name="content">
                <div class="mb-4">
                    <x-label value="ID" />
                    <x-input wire:model.defer="id_maquina_editar" type="text" class="w-full" disabled />
                    <x-input-error for="id_maquina_editar"/>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4 my-4 p-2 rounded">
                    <div class="mb-4">
                        <x-label value="{{ __('Modelo') }}" />
                        <select class="w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-300 rounded-md border border-primary pl-2 pr-2 py-2.5 focus:outline-none sm:text-sm" wire:model="modelo" >
                            <option value="1">Modelo SAFER</option>
                            <option value="2">Modelo Mecaelect</option>
                            <option value="3">Modelo Mecaelect 2</option>
                            <option value="4">Modelo Voltaje</option>
                        </select>
                        <x-input-error for="modelo" />
                    </div>
                    <div class="mb-4">
                        <x-label value="{{ __('Outputs') }}" />
                        <x-input wire:model.defer="numero_salidas" type="text" class="w-full" disabled />
                        <x-input-error for="numero_salidas"/>
                    </div>
                    <div class="mb-4">
                        <x-label value="{{ __('Client') }}" />
                        <select class="w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-300 rounded-md border border-primary pl-2 pr-2 py-2.5 focus:outline-none sm:text-sm" wire:model="usuario_id" >
                            @foreach ($lista_usu as $usuarios)
                                <option value="{{ $usuarios->id }}">{{ $usuarios->name }}</option>
                            @endforeach
                        </select>
                        <x-input-error for="usuario_id" />
                    </div>
                    <div class="mb-4">
                        <x-label value="{{ __('Owner') }}" />
                        <select class="w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-300 rounded-md border border-primary pl-2 pr-2 py-2.5 focus:outline-none sm:text-sm" wire:model="propietario_id" >
                            @foreach ($lista_usu as $usuarios)
                                <option value="{{ $usuarios->id }}">{{ $usuarios->name }}</option>
                            @endforeach
                        </select>
                        <x-input-error for="propietario_id" />
                    </div>
                </div>
            </x-slot>
            <x-slot name="footer">
                <x-secondary-button wire:click="$set('open_edit', false)">
                    {{ __('Cancel') }}
                </x-secondary-button>
                <x-boton-primario wire:click="update" wire:loading.attr="disabled" class="disabled:opacity-25 ml-2">
                    {{ __('Update') }}
                </x-boton-primario>
            </x-slot>
        </x-dialog-modal>
        <x-dialog-modal wire:model="open_crear">
            <x-slot name="title">
                {{ __('Machine') }}
            </x-slot>
            <x-slot name="content">
                <div class="mb-4">
                    <x-label value="ID" />
                    <x-input type="text" class="w-full" wire:model.defer="id_maquina"/>
                    <x-input-error for="id_maquina"/>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4 my-4 p-2 rounded">
                    <div class="mb-4">
                        <x-label value="{{ __('Modelo') }}" />
                        <select class="w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-300 rounded-md border border-primary pl-2 pr-2 py-2.5 focus:outline-none sm:text-sm" wire:model="modelo_crear" >    
                            <option value="">Select...</option>
                            <option value="1">Modelo SAFER</option>
                            <option value="2">Modelo Mecaelect</option>
                            <option value="3">Modelo Mecaelect 2</option>
                            <option value="4">Modelo Voltaje</option>
                        </select>
                        <x-input-error for="modelo_crear" />
                    </div>
                    <div class="mb-4">
                        <x-label value="{{ __('Outputs') }}" />
                        <select class="w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-300 rounded-md border border-primary pl-2 pr-2 py-2.5 focus:outline-none sm:text-sm" wire:model="numero_salidas_crear" >    
                            <option value="">Select...</option>
                            <option value="1">1 Output</option>
                            <option value="2">2 Outputs</option>
                            <option value="3">3 Outputs</option>
                        </select>
                        <x-input-error for="numero_salidas_crear" />
                    </div>
                    <div class="mb-4">
                        <x-label value="{{ __('Client') }}" />
                        <select class="w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-300 rounded-md border border-primary pl-2 pr-2 py-2.5 focus:outline-none sm:text-sm" wire:model="usuario_id_crear" >    
                            <option value="">Select...</option>
                            @foreach ($lista_usu as $usuario)
                                <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
                            @endforeach
                        </select>
                        <x-input-error for="usuario_id_crear" />
                    </div>
                    <div class="mb-4">
                        <x-label value="{{ __('Owner') }}" />
                        <select class="w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-300 rounded-md border border-primary pl-2 pr-2 py-2.5 focus:outline-none sm:text-sm" wire:model="propietario_id_crear" >    
                            <option value="">Select...</option>
                            @foreach ($lista_usu as $usuario)
                                <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
                            @endforeach
                        </select>
                        <x-input-error for="propietario_id_crear" />
                    </div>
                </div>
            </x-slot>
            <x-slot name="footer">
                <x-secondary-button wire:click="$set('open_crear',false)">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-boton-primario wire:click="save" wire:loading.attr="disabled" wire:target="save" class="disabled:opacity-25 ml-2">
                    {{ __('Register') }}
                </x-boton-primario>
            </x-slot>
        </x-dialog-modal>

        @push('js')
            <script src="sweetalert2.all.min.js"></script>
            <script>
                Livewire.on('eliminar', maquinaId => { 
                        Swal.fire({
                        title: '{{ __("Are you sure to delete this machine") }}?',
                        text: "{{ __('This operation cannot be reversed') }}",
                        icon: 'warning',
                        cancelButtonText: '{{ __("Cancel") }}',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: '¡{{ __("Yes, Im sure") }}!'
                    })
                    .then((result) => {
                        if (result.isConfirmed) {
                            @this.call('delete', maquinaId)

                            Swal.fire(
                                '',
                                '{{ __("Machine delete") }}.',
                                'success'
                            )
                        }
                    })
                });
            </script>
        @endpush
    </x-layouts.menu-admin>
</div>
