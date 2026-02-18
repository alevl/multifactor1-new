<div>
    <x-layouts.menu-admin>
        <div class="container">
            <span class="text-2xl font-semi-bold leading-normal">{{ __('Clients')}}</span>
            <div class="w-full flex mb-4 mt-2">
                <x-boton-primario wire:click="$set('open_crear', true)">
                    {{ __('New Client') }}
                </x-boton-primario>
            </div>
            <div class="col-12" style="overflow-x: auto">
                <div class="w-full">
                    <x-input type="text" wire:model.live="search" class="w-full border border-primary border py-2 rounded focus:outline-none" placeholder="{{ __('Search') }}) }}" />
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
                            <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center" style="cursor:pointer" wire:click="order('id')">
                                ID
                                @if($sort == 'id')
                                    @if($direccion == 'asc')
                                        <i class="icofont icofont-caret-up float-right" style="font-size: 1.3em"></i>
                                    @else
                                        <i class="icofont icofont-caret-down float-right" style="font-size: 1.3em"></i>
                                    @endif
                                @else
                                    <i class="icofont icofont-sort float-right mt-1"></i>
                                @endif
                            </th>
                            <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center" style="cursor:pointer" wire:click="order('name')">
                                {{ __('Name') }}
                                @if($sort == 'name')
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
                            <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center" style="cursor:pointer" wire:click="order('telefono')">
                                {{ __('Phone') }}
                                @if($sort == 'telefono')
                                    @if($direccion == 'asc')
                                        <i class="icofont icofont-caret-up float-right" style="font-size: 1.3em"></i>
                                    @else
                                        <i class="icofont icofont-caret-down float-right" style="font-size: 1.3em"></i>
                                    @endif
                                @else
                                    <i class="icofont icofont-sort float-right mt-1"></i>
                                @endif
                            </th>
                            <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center" style="cursor:pointer" wire:click="order('empresa')">
                                {{ __('Company') }}
                                @if($sort == 'empresa')
                                    @if($direccion == 'asc')
                                        <i class="icofont icofont-caret-up float-right" style="font-size: 1.3em"></i>
                                    @else
                                        <i class="icofont icofont-caret-down float-right" style="font-size: 1.3em"></i>
                                    @endif
                                @else
                                    <i class="icofont icofont-sort float-right mt-1"></i>
                                @endif
                            </th>
                            <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center" style="cursor:pointer" wire:click="order('nivel_id')">
                                {{ __('Level') }}
                                @if($sort == 'nivel_id')
                                    @if($direccion == 'asc')
                                        <i class="icofont icofont-caret-up float-right" style="font-size: 1.3em"></i>
                                    @else
                                        <i class="icofont icofont-caret-down float-right" style="font-size: 1.3em"></i>
                                    @endif
                                @else
                                    <i class="icofont icofont-sort float-right mt-1"></i>
                                @endif
                            </th>
                            <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center" style="cursor:pointer" wire:click="order('estatus_id')">
                                {{ __('Status') }}
                                @if($sort == 'estatus_id')
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
                                {{ __('Cant. Machines') }}
                            </th>
                            <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center">
                                {{ __('Date Register') }}
                            </th>
                            <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center">
                                {{ __('Action') }}
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($clientes as $datos_cli)
                            <tr class="text-gray-700">
                                <td class="border-b-2 p-2 dark:border-dark-5 text-center">
                                    {{ $datos_cli->id }}
                                </td>
                                <td class="border-b-2 p-2 dark:border-dark-5">
                                    <div>
                                        {{ $datos_cli->name }}
                                    </div>
                                    <div>
                                        {{ $datos_cli->username }}
                                    </div>
                                </td>
                                <td class="border-b-2 p-2 dark:border-dark-5 text-center">
                                    {{ $datos_cli->usuario_propietario->name }}
                                </td>
                                <td class="border-b-2 p-2 dark:border-dark-5 text-center">
                                    {{ $datos_cli->telefono }}
                                </td>
                                <td class="border-b-2 p-2 dark:border-dark-5 text-center">
                                    {{ $datos_cli->empresa }}
                                </td>
                                <td class="border-b-2 p-2 dark:border-dark-5 text-center">
                                    @if (($datos_cli->nivel_id) == 2)
                                        <span class="py-1 px-2 rounded" style="background-color: #a9cce3; color: #154360 ">
                                            {{ $datos_cli->usuario_nivel->nivel }}
                                        </span> 
                                    @else
                                        @if (($datos_cli->nivel_id) == 3)
                                            <span class="py-1 px-2 rounded" style="background-color: #fad7a0; color: #7e5109">
                                                {{ $datos_cli->usuario_nivel->nivel }}
                                            </span>
                                        @else
                                            <span class="py-1 px-2 rounded" style="background-color: #fad7a0; color: #7e5109">
                                                {{ $datos_cli->usuario_nivel->nivel }}
                                            </span>
                                        @endif
                                    @endif
                                </td>
                                <td class="border-b-2 p-2 dark:border-dark-5 text-center">
                                    @if (($datos_cli->estatus_id) == 1)
                                        <span class="py-1 px-2 rounded" style="background-color: #a3e4d7; color:#0e6251">
                                            {{ $datos_cli->usuario_estatus->estatus }}
                                        </span> 
                                    @else
                                        <span class="py-1 px-2 rounded" style="background-color: #fadbd8; color: #78281f">
                                            {{ $datos_cli->usuario_estatus->estatus }}
                                        </span>
                                    @endif
                                </td>
                                <td class="border-b-2 p-2 dark:border-dark-5 text-center">
                                    @foreach($clientes_maquinas as $maquinas)
                                        @if($maquinas->usuario_id == $datos_cli->id)
                                            {{ $maquinas->total_maquinas }}
                                        @endif
                                    @endforeach                                    
                                </td>
                                <td class="border-b-2 p-2 dark:border-dark-5 text-center">
                                    {{ date("d/m/Y", strtotime($datos_cli->created_at)) }}
                                </td>

                                <td class="border-b-2 p-2 dark:border-dark-5 text-center">
                                    <a wire:click="edit({{ $datos_cli }})" class="cursor-pointer" title="{{ __('Client edit') }}"><i class="icofont icofont-edit-alt texto-azul" style="font-size: 1.3em"></i></a>
                                    <a wire:click="$dispatch('clave', {{ $datos_cli->id }})" class="cursor-pointer" title="{{ __('Reset password') }}"><i class="icofont icofont-key texto-rojo" style="font-size: 1.3em"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @if($clientes->hasPages())
                <div class="px-6 py-3">
                    {{ $clientes->links() }}
                </div>                    
            @endif
        </div>
        <x-dialog-modal wire:model="open_edit">
            <x-slot name="title">
                {{ __('Client') }}
            </x-slot>
            <x-slot name="content">
                <div class="mb-4">
                    <x-label value="{{ __('Username') }}" />
                    <x-input wire:model.defer="username_editar" type="text" class="w-full" disabled />
                    <x-input-error for="username_editar"/>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4 my-4 p-2 rounded">
                    <div class="mb-4">
                        <x-label value="{{ __('Name') }}" />
                        <x-input wire:model="name" type="text" class="w-full"/>
                        <x-input-error for="name"/>
                    </div>
                    <div class="mb-4">
                        <x-label value="{{ __('Company') }}" />
                        <x-input wire:model="empresa" type="text" class="w-full"/>
                        <x-input-error for="empresa"/>
                    </div>
                    <div class="mb-4">
                        <x-label value="{{ __('Phone') }}" />
                        <x-input wire:model="telefono" type="text" class="w-full"/>
                        <x-input-error for="telefono"/>
                    </div>
                    <div class="mb-4">
                        <x-label value="{{ __('Level') }}" />
                        <select class="w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-300 rounded-md border border-primary pl-2 pr-2 py-2.5 focus:outline-none sm:text-sm" wire:model="nivel_id" >
                            @foreach ($lista_niv as $niveles)
                                <option value="{{ $niveles->id }}">{{ $niveles->nivel }}</option>
                            @endforeach
                        </select>
                        <x-input-error for="nivel_id" />
                    </div>
                    <div class="mb-4">
                        <x-label value="{{ __('Status') }}" />
                        <select class="w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-300 rounded-md border border-primary pl-2 pr-2 py-2.5 focus:outline-none sm:text-sm" wire:model="estatus_id" >
                            @foreach ($lista_est as $estatus_user)
                                <option value="{{ $estatus_user->id }}">{{ $estatus_user->estatus }}</option>
                            @endforeach
                        </select>
                        <x-input-error for="estatus_id" />
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
                {{ __('Client') }}
            </x-slot>
            <x-slot name="content">
                <div class="mb-4">
                    <x-label value="{{ __('Username') }}" />
                    <x-input type="text" class="w-full" wire:model.defer="username"/>
                    <x-input-error for="username"/>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4 my-4 p-2 rounded">
                    <div class="mb-4">
                        <x-label value="{{ __('Name') }}" />
                        <x-input type="text" class="w-full" wire:model.defer="name_crear"/>
                        <x-input-error for="name_crear"/>
                    </div>
                    <div class="mb-4">
                        <x-label value="{{ __('Company') }}" />
                        <x-input type="text" class="w-full" wire:model.defer="empresa_crear"/>
                        <x-input-error for="empresa_crear"/>
                    </div>
                    <div class="mb-4">
                        <x-label value="{{ __('Phone') }}" />
                        <x-input type="text" class="w-full" wire:model.defer="telefono_crear"/>
                        <x-input-error for="telefono_crear"/>
                    </div>
                    <div class="mb-4">
                        <x-label value="{{ __('Level') }}" />
                        <select class="w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-300 rounded-md border border-primary pl-2 pr-2 py-2.5 focus:outline-none sm:text-sm" wire:model="nivel_id_crear" >    
                            <option value="">Select...</option>
                            @foreach ($lista_niv as $niveles)
                                <option value="{{ $niveles->id }}">{{ $niveles->nivel }}</option>
                            @endforeach
                        </select>
                        <x-input-error for="nivel_id_crear" />
                    </div>
                    <div class="mb-4">
                        <x-label value="{{ __('Status') }}" />
                        <select class="w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-500 rounded-md border border-primary pl-2 pr-2 py-2.5 focus:outline-none sm:text-sm" wire:model="estatus_id_crear" >
                            <option value="">Select...</option>
                            @foreach ($lista_est as $estatus)
                                <option value="{{ $estatus->id }}">{{ $estatus->estatus }}</option>
                            @endforeach
                        </select>
                        <x-input-error for="estatus_id_crear" />
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
                Livewire.on('clave', usuarioId => { 
                        Swal.fire({
                        title: '¿{{ __("Are you sure to reset this password") }}?',
                        text: "¡{{ __('The password will be') }}: 123456789!",
                        icon: 'warning',
                        cancelButtonText: '{{ __("Cancel") }}',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: '¡{{ __("Yes, Im sure") }}!'
                    })
                    .then((result) => {
                        if (result.isConfirmed) {
                            @this.call('resetear_clave', usuarioId)

                            Swal.fire(
                                '',
                                '{{ __("Password reset") }}.',
                                'success'
                            )
                        }
                    })_f      n
                });
            </script>
        @endpush
    </x-layouts.menu-admin>
</div>
