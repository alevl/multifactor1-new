<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="og:description" content="Ingenieria">
        <meta name="robots" content="index, follow">
        <link rel="shortcut icon" href="{{ asset('storage/sistema/favicon.png') }}" type="image/x-icon">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <!--ICONOS-->
        <link rel="stylesheet" href="{{ asset('librerias/iconos/iconos/icofont.css') }}">
        <!--TAILWIND-->
        <script src="https://cdn.tailwindcss.com"></script>
        <!--MIS ESTILOS-->
        <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
    </head>
    <body class="relative w-full h-full items-center justify-center p-10 overflow-hidden text-white bg-no-repeat bg-cover relative" style="background-image: url({{ asset('storage/sistema/fondo-inicio.png') }}); background-size:100% 100%; background-attachment:fixed;">
        <div class="w-full  mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4 my-4 p-2 rounded mx-auto" style="margin-top: 15%;">
                <div style="text-align: center">
                    <img src="{{ asset('storage/sistema/logo-blanco.png') }}" class="responsive1" style="position:relative; margin:auto" width="40%">
                </div>
                <div class="mt-12">
                    <x-validation-errors class="mb-4" />
                    <form method="POST" action="{{ route('acceso.acceso') }}">
                        @csrf
                        <div class="mb-2">
                            <div class="relative">
                            <input type="text" id="username" name="username" class="entrada text-center rounded-3xl border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="Username" style="width:100% !important"/>
                            </div>
                        </div>
                        <div class="mb-2">
                            <div class=" relative ">
                                <input type="password" id="password" name="password" class="text-center rounded-3xl border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="Password"/>
                            </div>
                        </div>
                        <div class="flex items-center justify-between mt-4">
                            <button type="submit" class="rounded-3xl py-2 px-4 focus:ring-offset-indigo-200 w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 fondo-segundo texto-primero">
                                LOG IN
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>