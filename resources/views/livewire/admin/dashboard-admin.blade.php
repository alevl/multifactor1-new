<div>
    <x-layouts.menu-admin>
        <div class="container">
            <span class="text-2xl font-semi-bold leading-normal">{{ __('Dashboard') }}</span>
            <div class="col-12" style="overflow-x: auto">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 my-4 p-2 rounded">
                    <div class="text-center relative w-full px-4 py-2 bg-white shadow-lg dark:bg-gray-700">
                        <p class="text-2xl font-bold dark:text-white texto-azul">
                            {{ $total_usuarios }}
                        </p>
                        <p class="text-sm" style="color:#212f3d">
                            {{ __('Users') }}
                        </p>
                        <span class="absolute p-4 rounded-full top-2 right-4">
                            <i class="icofont icofont-user-alt-5 texto-primero" style="font-size:2.2em;"></i>
                        </span>
                    </div>
                    <div class="text-center relative w-full px-4 py-2 bg-white shadow-lg dark:bg-gray-700">
                        <p class="text-2xl font-bold dark:text-white texto-azul">
                            {{ $total_franquiciados }}
                        </p>
                        <p class="text-sm texto-primero">
                            {{ __('Franchisee') }}
                        </p>
                        <span class="absolute p-4 rounded-full top-2 right-4">
                            <i class="icofont icofont-user-male texto-primero" style="font-size:2.2em;"></i>
                        </span>
                    </div>
                    <div class="text-center relative w-full px-4 py-2 bg-white shadow-lg dark:bg-gray-700">
                        <p class="text-2xl font-bold dark:text-white texto-azul">
                            {{ $total_maquinas_activas }}
                        </p>
                        <p class="text-sm" style="color:#212f3d">
                            {{ __('Machines Actives') }}
                        </p>
                        <span class="absolute p-4 rounded-full top-2 right-4">
                            <i class="icofont icofont-automation texto-primero" style="font-size:2.2em;"></i>
                        </span>
                    </div>
                    <div class="text-center relative w-full px-4 py-2 bg-white shadow-lg dark:bg-gray-700">
                        <p class="text-2xl font-bold dark:text-white texto-azul">
                            {{ $total_maquinas_inactivas }}
                        </p>
                        <p class="text-sm" style="color:#212f3d">
                            {{ __('Machine Inantives') }}
                        </p>
                        <span class="absolute p-4 rounded-full top-2 right-4">
                            <i class="icofont icofont-settings-alt texto-primero" style="font-size:2.2em;"></i>
                        </span>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 my-4 p-2 rounded">
                    <div class="w-full">
                        <div class="relative w-full px-4 py-6 bg-white shadow-lg dark:bg-gray-700">
                            <p class="text-sm font-semibold text-gray-700 border-b border-gray-200 w-max dark:text-white">
                                {{ __('Client') }}
                            </p>
                            <div class="flex items-end my-6 space-x-2">
                                <p class="text-5xl font-bold dark:text-white texto-primero">
                                    {{ $total_usuarios }}
                                </p>
                                <span class="flex items-center text-xl font-bold text-green-500">
                                </span>
                            </div>
                            <div class="dark:text-white">
                                @foreach($lista_usuarios as $usu)
                                    <div class="flex items-center justify-between pb-2 mb-2 text-sm border-b border-gray-200 sm:space-x-12">
                                        <p>
                                            {{ $usu->name }}
                                        </p>
                                        <div class="flex items-end text-xs">
                                            {{ $usu->telefono }}
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="w-full">
                        <div class="relative w-full px-4 py-6 bg-white shadow-lg dark:bg-gray-700">
                            <p class="text-sm font-semibold text-gray-700 border-b border-gray-200 w-max dark:text-white">
                                {{ __('Franchisee') }}
                            </p>
                            <div class="flex items-end my-6 space-x-2">
                                <p class="text-5xl font-bold dark:text-white texto-primero">
                                    {{ $total_franquiciados }}
                                </p>
                                <span class="flex items-center text-xl font-bold text-green-500">
                                </span>
                            </div>
                            <div class="dark:text-white">
                                @foreach($lista_franquiciados as $fran)
                                    <div class="flex items-center justify-between pb-2 mb-2 text-sm border-b border-gray-200 sm:space-x-12">
                                        <p>
                                            {{ $fran->name }}
                                        </p>
                                        <div class="flex items-end text-xs">
                                            {{ $fran->telefono }}
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="w-full">
                        <div class="relative w-full px-4 py-6 bg-white shadow-lg dark:bg-gray-700">
                            <p class="text-sm font-semibold text-gray-700 border-b border-gray-200 w-max dark:text-white">
                                {{ __('Machines') }}
                            </p>
                            <div class="flex items-end my-6 space-x-2">
                                <p class="text-5xl font-bold dark:text-white texto-primero">
                                    {{ $total_maquinas_activas + $total_maquinas_inactivas }}
                                </p>
                                <span class="flex items-center text-xl font-bold text-green-500">
                                </span>
                            </div>
                            <div class="dark:text-white">
                                @foreach($lista_maquinas as $maq)
                                    <div class="flex items-center justify-between pb-2 mb-2 text-sm border-b border-gray-200 sm:space-x-12">
                                        <p>
                                            {{ $maq->id_maquina }}
                                        </p>
                                        <div class="flex items-end text-xs">
                                            {{ $maq->numero_salidas }}
                                            {{ __('Outpus') }}
                                            @if($maq->maquina_registrada == 1)
                                                <span class="texto-verde ml-2">(Active)</span>
                                            @else
                                                <span class="texto-rojo ml-2">(Inactive)</span>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-layouts.menu-admin>
</div>
