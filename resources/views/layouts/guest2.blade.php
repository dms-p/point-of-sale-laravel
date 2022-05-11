<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="bg-gray-100 w-full min-h-screen py-8 flex items-center justify-center">
        <div class="max-w-screen-md w-full my-auto mx-auto p-4">
            {{$slot}}
        </div>
    </body>
    @stack('modals')
    @livewireScripts
    <script src="{{asset('vendor/sweetalert/sweetalert2@10.js')}}"></script>
    <script src="{{ mix('js/app.js') }}"></script>
    <script src="{{asset('js/main.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js" data-turbolinks-eval="false" data-turbo-eval="false"></script>
    @stack('script')
</html>
