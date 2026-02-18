<header>
    <nav class="bg-white border-gray-200 dark:bg-gray-900">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="{{ route('dashboard-read') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="{{ asset('storage/sistema/logo.png') }}" class="h-10" alt="Multifactor1 logo">
            </a>
            <div class="flex items-center md:order-2 space-x-1 md:space-x-0 rtl:space-x-reverse">                
                <button type="button" data-dropdown-toggle="language-dropdown-menu" class="inline-flex items-center font-medium justify-center px-4 py-2 text-sm text-gray-900 dark:text-white rounded-lg cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
                    @if(session('locale') == 'es')
                        <img class="w-5 h-5 rounded-full me-3" src="{{ asset('storage/idiomas/espanol.png') }}" >
                        Español
                    @else
                        @if(session('locale') == 'en')
                            <img class="w-5 h-5 rounded-full me-3" src="{{ asset('storage/idiomas/ingles.png') }}" >
                            English
                        @endif
                    @endif
                </button>
                <!-- Dropdown -->
                <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700" id="language-dropdown-menu">
                    <ul class="py-2 font-medium" role="none">
                        <li>
                            <a href="locale/es" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">
                                <div class="inline-flex items-center">
                                    <img class="h-3.5 w-3.5 rounded-full me-2" src="{{ asset('storage/idiomas/espanol.png') }}" >
                                    Español
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="locale/en" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">
                                <div class="inline-flex items-center">
                                    <img class="h-3.5 w-3.5 rounded-full me-2" src="{{ asset('storage/idiomas/ingles.png') }}" >
                                    English
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                <button data-collapse-toggle="navbar-language" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-language" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                    </svg>
                </button>
            </div>
            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-language">
                <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li>
                        <a href="{{ route('dashboard-read') }}" class="block py-2 px-3 text-gray-400 hover:text-blue-300 md:p-0">{{ __('Dashboard') }}</a>
                    </li>
                    <li>
                        <a href="https://wa.me/+584241906854?text=hello, " target="_blank" class="block py-2 px-3 text-gray-400 hover:text-blue-300 md:p-0">{{ __('Support') }}</a>
                    </li>
                    <li>
                        <a href="{{ route('perfil-read') }}" class="block py-2 px-3 text-gray-400 hover:text-blue-300 md:p-0">{{ __('Profile') }}</a>
                    </li>
                    <li>
                        <a href="{{ route('salir.cierre') }}" class="block py-2 px-3 text-gray-400 hover:text-blue-300 md:p-0">{{ __('Log Out') }}</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<body class="bg-gray-100">
    <div class="bg-gray-100 max-w-7xl mx-auto py-2 px-4 sm:px-6 lg:px-8" style="padding-top:15px">
        {{ $slot }}
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>