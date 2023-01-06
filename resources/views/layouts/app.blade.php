<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Geekworks Forge') }}</title>
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
        <!-- Scripts -->
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <div class="max-w-7xl mx-auto">
            <div class="min-h-screen flex">
                <div class="flex-initial lg:w-60">
                    @include('layouts.left-sidebar')
                </div>
                <div class="flex-1 border-x border-gray-200">
                    <div class="p-2 lg:p-3 sticky top-0 bg-white border-b border-gray-300">
                        <h3 class="px-2 my-3 font-medium rounded-md leading-5 text-lg text-black uppercase tracking-wider">
                            <span class="alert-title">{{ $title }}</span>
                        </h3>
                    </div>
                    <div class="p-2 lg:p-3">
                        {{ $slot }}
                    </div>
                </div>
                <div class="hidden md:block flex-initial">
                    @include('layouts.right-sidebar')
                </div>
            </div>
        </div>
        @livewireScripts
    </body>
</html>
