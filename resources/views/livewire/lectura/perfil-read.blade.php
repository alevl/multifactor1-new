<div>
    <x-layouts.menu-lectura>
        <div class="container">
            <span class="text-2xl font-semi-bold leading-normal">{{ __('Profile') }}</span>

            <div class="bg-white rounded shadow p-4 mt-6" >
                <div class="flex flex-wrap -mb-6 mt-6">
                    <h4 class="text-lg font-semibold mb-6 texto-azul">{{ __('Personal information') }}</h4>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4 my-4 p-2 rounded">
                    <div class="mb-4">
                        <x-label value="{{ __('Username') }}" />
                        <x-input wire:model.defer="username" type="text" class="w-full" disabled />
                        <x-input-error for="username"/>
                    </div>
                    <div class="mb-4">
                        <x-label value="{{ __('Company') }}" />
                        <x-input wire:model.defer="empresa" type="text" class="w-full" disabled />
                        <x-input-error for="empresa"/>
                    </div>
                    <div class="mb-4">
                        <x-label value="{{ __('Name') }}" />
                        <x-input wire:model.defer="name" type="text" class="w-full" />
                        <x-input-error for="name"/>
                    </div>
                    <div class="mb-4">
                        <x-label value="{{ __('Phone') }}" />
                        <x-input wire:model.defer="telefono" type="text" class="w-full" />
                        <x-input-error for="telefono"/>
                    </div>
                </div>
                <x-boton-primario wire:click="actualizar" wire:loading.attr="disabled" class="disabled:opacity-25 ml-2 bg-primary text-white p-2 mb-6">
                    {{ __('Update Information') }}
                </x-boton-primario>
            </div>

            <div class="bg-white rounded shadow p-4 mt-6" >
                <div class="flex flex-wrap -mb-6 mt-4">
                    <h4 class="text-lg font-semibold mb-6 texto-azul">{{ __('Change Password') }}</h4>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4 my-4 p-2 rounded">
                    <div class="mb-4">
                        <x-label value="{{ __('Password') }}" />
                        <x-input wire:model.defer="password1" type="password" class="w-full" />
                        <x-input-error for="password1"/>
                    </div>
                    <div class="mb-4">
                        <x-label value="{{ __('Repeat Password') }}" />
                        <x-input wire:model.defer="password2" type="password" class="w-full" />
                        <x-input-error for="password2"/>
                    </div>
                </div>
                <x-boton-primario wire:click="actualizar_clave" wire:loading.attr="disabled" class="disabled:opacity-25 ml-2 bg-primary text-white p-2">
                    {{ __('Update Password') }}
                </x-boton-primario>
            </div>
        </div>
    </x-layouts.menu-lectura>
</div>