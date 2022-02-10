<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" @class(["dark" => (auth()->user()->dark_mode ?? false)])>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}@hasSection('page-title') - @yield('page-title') @endif</title>
        @include('components.og-tags')
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        @livewireStyles
        <link rel="stylesheet" href="https://unpkg.com/trix@1.3.1/dist/trix.css">
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        @include('components.analytics')
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-zinc-700 dark:bg-zinc-900" style="background-image: url('/storage/img/forge-bg.png'); background-repeat: no-repeat; background-attachment: fixed; background-size: cover; background-position: center center;">
            <main>
                {{ $slot }}
            </main>
        </div>
        @livewireScripts
        <script src="https://unpkg.com/trix@1.3.1/dist/trix.js"></script>
        <script src="https://unpkg.com/@popperjs/core@2"></script>
        <script src="https://unpkg.com/tippy.js@6"></script>
    </body>
</html>
