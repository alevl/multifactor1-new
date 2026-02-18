<div>
    <x-layouts.menu-franquicia>
        <div class="container">
            <span class="text-2xl font-semi-bold leading-normal">{{ __('Alerts') }}</span>
            <div class="col-12" style="overflow-x: auto">
                <div class="w-full">
                    <x-input type="text" wire:model.live="search" class="w-full border border-primary border py-2 rounded focus:outline-none" placeholder="{{ __('Search') }}" />
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
                            <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center" style="cursor:pointer" wire:click="order('nombre')">
                                {{ __('Name') }}
                                @if($sort == 'nombre')
                                    @if($direccion == 'asc')
                                        <i class="icofont icofont-caret-up float-right" style="font-size: 1.3em"></i>
                                    @else
                                        <i class="icofont icofont-caret-down float-right" style="font-size: 1.3em"></i>
                                    @endif
                                @else
                                    <i class="icofont icofont-sort float-right mt-1"></i>
                                @endif
                            </th>
                            <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center" style="cursor:pointer" wire:click="order('lectura_minima')">
                                {{ __('Minimum Reading') }}
                                @if($sort == 'lectura_minima')
                                    @if($direccion == 'asc')
                                        <i class="icofont icofont-caret-up float-right" style="font-size: 1.3em"></i>
                                    @else
                                        <i class="icofont icofont-caret-down float-right" style="font-size: 1.3em"></i>
                                    @endif
                                @else
                                    <i class="icofont icofont-sort float-right mt-1"></i>
                                @endif
                            </th>
                            <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center" style="cursor:pointer" wire:click="order('lectura_maxima')">
                                {{ __('Maximum Reading') }}
                                @if($sort == 'lectura_maxima')
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
                                {{ __('Email 1') }}
                            </th>
                            <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center">
                                {{ __('Email 2') }}
                            </th>
                            <th class="border-b-2 p-2 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900 text-center">
                                {{ __('Email 3') }}
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
                                    {{ $datos_maq->nombre }}
                                </td>
                                <td class="border-b-2 p-2 dark:border-dark-5 text-center">
                                    {{ $datos_maq->lectura_minima }}
                                </td>
                                <td class="border-b-2 p-2 dark:border-dark-5 text-center">
                                    {{ $datos_maq->lectura_maxima }}
                                </td>
                                <td class="border-b-2 p-2 dark:border-dark-5 text-center">
                                    {{ $datos_maq->email1 }}
                                </td>
                                <td class="border-b-2 p-2 dark:border-dark-5 text-center">
                                    {{ $datos_maq->email2 }}
                                </td>
                                <td class="border-b-2 p-2 dark:border-dark-5 text-center">
                                    {{ $datos_maq->email3 }}
                                </td>
                                <td class="border-b-2 p-2 dark:border-dark-5 text-center">
                                    @if (($datos_maq->estatus_id) == 1)
                                        <span class="py-1 px-2 rounded" style="background-color: #a3e4d7; color:#0e6251">
                                            {{ $datos_maq->maquina_estatus->estatus }}
                                        </span> 
                                    @else
                                        <span class="py-1 px-2 rounded" style="background-color: #fadbd8; color: #78281f">
                                            {{ $datos_maq->maquina_estatus->estatus }}
                                        </span>
                                    @endif
                                </td>
                                <td class="border-b-2 p-2 dark:border-dark-5 text-center">
                                    <a wire:click="edit({{ $datos_maq }})" class="cursor-pointer" title="{{ __('Machine edit') }}"><i class="icofont icofont-edit-alt texto-azul" style="font-size: 1.3em"></i></a>
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
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4 my-4 p-2 rounded">
                    <div class="mb-4">
                        <x-label value="ID" />
                        <x-input wire:model.defer="id_maquina_editar" type="text" class="w-full" disabled />
                        <x-input-error for="id_maquina_editar"/>
                    </div>
                    <div class="mb-4">
                        <x-label value="{{ __('Name') }}" />
                        <x-input wire:model.defer="nombre" type="text" class="w-full" disabled/>
                        <x-input-error for="nombre"/>
                    </div>
                    <div class="mb-4">
                        <x-label value="{{ __('Minimum Reading') }}" />
                        <x-input wire:model.defer="lectura_minima" type="text" class="w-full"/>
                        <x-input-error for="lectura_minima"/>
                    </div>
                    <div class="mb-4">
                        <x-label value="{{ __('Maximum Reading') }}" />
                        <x-input wire:model.defer="lectura_maxima" type="text" class="w-full"/>
                        <x-input-error for="lectura_maxima"/>
                    </div>
                </div>
                <div class="mb-4">
                    <x-label value="{{ __('Email') }} 1" />
                    <x-input wire:model.defer="email1" type="text" class="w-full"/>
                    <x-input-error for="email1"/>
                </div>
                <div class="mb-4">
                    <x-label value="{{ __('Email') }} 2" />
                    <x-input wire:model.defer="email2" type="text" class="w-full"/>
                    <x-input-error for="email2"/>
                </div>
                <div class="mb-4">
                    <x-label value="{{ __('Email') }} 3" />
                    <x-input wire:model.defer="email3" type="text" class="w-full"/>
                    <x-input-error for="email3"/>
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
    </x-layouts.menu-franquicia>
</div>
