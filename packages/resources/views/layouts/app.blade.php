<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
        <!-- header/navigation -->
        <div x-data="{ isOpen: false }" class="flex justify-between p-4 bg-black-600 lg:p-8">
            <div class="flex items-center">
                <h3 class="text-2xl font-bold text-white">GAMERS LEGACY</h3>
            </div>

            <!-- left header section -->
            <div class="flex items-center justify-between">
                <button @click="isOpen = !isOpen" type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white lg:hidden" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
                <div class="hidden space-x-6 lg:inline-block hover:decoration-black-400">
                    <a href="{{route('viewall')}}" class="text-xl font-bold  text-gray-200 uppercase dark:text-white hover:text-black dark:hover:text-purple-500	">View All</a>
                    <a href="{{route('search')}}" class="text-xl font-bold  text-gray-200 uppercase dark:text-white hover:text-black dark:hover:text-purple-500	">Search by Serial Number</a>
                    <a href="{{route('logout')}}" class="text-xl font-bold  text-gray-200 uppercase dark:text-white hover:text-black dark:hover:text-purple-500	">Logout</a>
                </div>

                <!-- mobile navbar -->
                <div class="mobile-navbar">
                    <!-- navbar wrapper -->
                    <div class="fixed left-0 w-full h-48 p-5 bg-black-600 rounded-lg shadow-xl top-16" x-show="isOpen"
                        @click.away=" isOpen = false">
                        <div class="flex flex-col space-y-6">
                            <a href="{{route('viewall')}}" class="text-xl font-bold  text-gray-200 uppercase dark:text-white-400 hover:text-black">View All</a>
                            <a href="{{route('search')}}" class="text-xl font-bold  text-gray-200 uppercase dark:text-white-400 hover:text-black">Search by Serial Number</a>
                            <a href="{{route('logout')}}" class="text-xl font-bold  text-gray-200 uppercase dark:text-white-400 hover:text-black">Logout</a>
                        </div>
                    </div>
                </div>
                <!-- end mobile navbar -->
            </div>
            <!-- right header section -->

        </div>
        <main>
            @yield('content')
        </main>
    </body>
</html>