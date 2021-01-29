<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        <!-- Alpine -->
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

        @livewireStyles
        <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@1.3.1/dist/trix.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css">

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">

        <div class="relative bg-light-blue-700 pb-32 overflow-hidden">
            <!-- On: "bg-light-blue-900", Off: "bg-transparent" -->
            <x-navigation.navigation-menu />
            <!-- Page Header Background -->
            <x-common.header-background />
            <!-- Page Heading -->
            <header class="relative py-10">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <h1 class="text-3xl font-bold text-white">
                        {{ $header ?? '' }}
                    </h1>
                </div>
            </header>
        </div>
            <!-- Page Content -->
        <main class="relative -mt-32">
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
{{--                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg pb-3">--}}
                        {{ $slot }}
{{--                    </div>--}}
                </div>
            </div>
        </main>

        <!-- Notifications -->
        <x-common.notification />

        @stack('modals')

        @livewireScripts
        @stack('scripts')
        <script src="https://unpkg.com/moment"></script>
        <script src="https://unpkg.com/trix@1.3.1/dist/trix.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>
    </body>
</html>
