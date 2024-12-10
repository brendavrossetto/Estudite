<!DOCTYPE html>
<html lang="pt-br">
<head>




    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo')</title>
    <meta name="author" content="David Grzyb">
    <meta name="description" content="">

    <!-- Tailwind -->
    <link href="{{ asset('css/tailwind.min.css')}}" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');
        .font-family-karla { font-family: karla; }
        .bg-sidebar { background: #0000be; }
        .cta-btn { color: rgb(86, 122, 250); }
        .upgrade-btn { background: #1947ee; }
        .upgrade-btn:hover { background: #0038fd; }
        .active-nav-link { background: #1947ee; }
        .nav-item:hover { background: #1947ee; }
        .account-link:hover { background: #3d68ff; }
    </style>
</head>
<body class="bg-gray-100 font-family-karla flex">

    <aside class="relative bg-sidebar h-screen w-64 hidden sm:block shadow-xl">
        <div class="p-6">
            <a href="{{ route('index') }}" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">Admin</a>
            
        </div>
        <nav class="text-white text-base font-semibold pt-3">
            <a href="{{ route('index') }}" class="flex items-center text-white py-4 pl-6 nav-item 
            @if (Request::is ('/')) active-nav-link 
            @else opacity-75 hover:opacity-100
            @endif">
                <i class="fas fa-home mr-3"></i>
                Inicial
            </a>
            <a href="{{route('materias')}}" class="flex items-center text-white py-4 pl-6 nav-item 
            @if (Request::is ('materias*')) active-nav-link 
            @else opacity-75 hover:opacity-100
            @endif">
                <i class="fas fa-paw mr-3"></i>
                Materias
            </a>
            @if (Auth::user() && Auth::user() ['admin'])
            <a href="{{('usuarios')}}" class="flex items-center text-white  py-4 pl-6 nav-item 
            @if (Request::is ('usuarios*')) active-nav-link 
            @else opacity-75 hover:opacity-100
            @endif">
                <i class="fas fa-dragon mr-3"></i>
                Usuarios
            </a>
            @endif
        </nav>
    </aside>

    <div class="relative w-full flex flex-col h-screen overflow-y-hidden">
        <!-- Desktop Header -->
        <header class="w-full items-center bg-white py-2 px-6 hidden sm:flex">
            <div class="w-1/2"></div>
            <div x-data="{ isOpen: false }" class="relative w-1/2 flex justify-end">

                <span class="flex items-center mr-2">
                    @if (Auth::user())
                    {{Auth::user()['name']}}
                    @else 
                    Voce não está autenticado
                    @endif
                </span>

                <button @click="isOpen = !isOpen" class="realtive z-10 w-12 h-12 rounded-full overflow-hidden border-4 border-gray-400 hover:border-gray-300 focus:border-gray-300 focus:outline-none">
                <img src="{{asset('img/icon.jpg')}}">
                </button>
                <button x-show="isOpen" @click="isOpen = false" class="h-full w-full fixed inset-0 cursor-default"></button>
                <div x-show="isOpen" class="absolute w-32 bg-white rounded-lg shadow-lg py-2 mt-16">
                    @if (Auth::user())
                    <a href="{{route('logout')}}" class="block px-4 py-2 account-link hover:text-white">Logout</a>
                    @else 
                    <a href="{{route('login')}}" class="block px-4 py-2 account-link hover:text-white">Login</a>
                    @endif
                    
                </div>
            </div>
        </header>

        <!-- Mobile Header & Nav -->
        <header x-data="{ isOpen: false }" class="w-full bg-sidebar py-5 px-6 sm:hidden">
            <div class="flex items-center justify-between">
                <a href="{{ route('index') }}" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">Admin</a>
                <button @click="isOpen = !isOpen" class="text-white text-3xl focus:outline-none">
                    <i x-show="!isOpen" class="fas fa-bars"></i>
                    <i x-show="isOpen" class="fas fa-times"></i>
                </button>
            </div>

            <!-- Dropdown Nav -->
            <nav :class="isOpen ? 'flex': 'hidden'" class="flex flex-col pt-4">
                <a href="{{ route('index') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                    <i class="fas fa-tachometer-alt mr-3"></i>
                    Dashboard
                </a>
                <a href="blank.html" class="flex items-center active-nav-link text-white py-2 pl-4 nav-item">
                    <i class="fas fa-sticky-note mr-3"></i>
                    Blank Page
                </a>
                <a href="tables.html" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                    <i class="fas fa-table mr-3"></i>
                    Tables
                </a>
                <a href="forms.html" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                    <i class="fas fa-align-left mr-3"></i>
                    Forms
                </a>
                <a href="tabs.html" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                    <i class="fas fa-tablet-alt mr-3"></i>
                    Tabbed Content
                </a>
                <a href="calendar.html" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                    <i class="fas fa-calendar mr-3"></i>
                    Calendar
                </a>
                <a href="#" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                    <i class="fas fa-cogs mr-3"></i>
                    Support
                </a>
                <a href="#" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                    <i class="fas fa-user mr-3"></i>
                    My Account
                </a>
                <a href="#" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                    <i class="fas fa-sign-out-alt mr-3"></i>
                    Sign Out
                </a>
                <button class="w-full bg-white cta-btn font-semibold py-2 mt-3 rounded-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
                    <i class="fas fa-arrow-circle-up mr-3"></i> Upgrade to Pro!
                </button>
            </nav>
            <!-- <button class="w-full bg-white cta-btn font-semibold py-2 mt-5 rounded-br-lg rounded-bl-lg rounded-tr-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
                <i class="fas fa-plus mr-3"></i> New Report
            </button> -->
        </header>
    
        <div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
            <main class="w-full flex-grow p-6">
                <h1 class="text-3xl text-black pb-6">@yield('titulo')</h1>

                <div class="flex flex-wrap">

                   <div class="leading-loose min-w-full mb-2">
                        @if(session('erro'))
                        <div class="bg-red-200 border-t-4 border-red-500 rounded-b text-red-800 px-4 py-3 shadow-md" role="alert">
                            <div class="flex">
                              <div class="py-1"> <i class="fas fa-exclamation-triangle"></i> </div>
                              <div>
                                <p class="font-bold">Erro!</p>
                                <p class="text-sm">{{ session('erro') }}</p>
                              </div>
                            </div>
                          </div>
                        @endif
                    </div>

                     <div class="leading-loose ">
                    @yield('conteudo')
                     </div>
                </div>
            </main>
    
            <footer class="w-full bg-white text-right p-4">
                Built by <a target="_blank" href="https://davidgrzyb.com" class="underline">David Grzyb</a>.
            </footer>
        </div>
        
    </div>

    <!-- AlpineJS -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
</body>
</html>