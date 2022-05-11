<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <!-- Styles -->
        <link rel="stylesheet" href="{{asset('css/app.css') }}">
        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}"></script>
    </head>
    <body class="font-sans antialiased min-h-screen bg-gray-100 tracking-normal">
        <x-navigation-cashier></x-navigation-cashier>

        <!-- Page Content -->
        <main class="w-full sm:max-w-screen-lg max-w-full min-h-screen mt-8 pb-10 mx-auto px-2 lg:px-4">
            {{ $slot }}
        </main>
        <footer class="flex bg-gray-200 font-semibold justify-between items-center py-3 px-4 lg:px-6 text-gray-600 text-sm">
            <span class="">@copy 2020 - {{date('Y')}}</span>
            <span class="">code with in sidoarjo</span>
        </footer>
        @stack('modals')
        @livewireScripts
        <script src="{{asset('js/main.js')}}"></script>
        @stack('script')
    </body>
</html>
