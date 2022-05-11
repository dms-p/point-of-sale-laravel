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
        @livewireScripts
        <script src="{{ mix('js/app.js') }}"></script>
    </head>
    <body class="font-sans antialiased min-h-screen bg-gray-100 tracking-normal">
        <div class="flex flex-wrap">
            <div id="sideLeft">
                @include('include.sidebar')
            </div>
            <div id="sideRight">
                @livewire('navigation-dropdown')
                <div class="max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8 min-h-screen pb-10 py-6">
                    {{$slot}}
                </div>
                <footer class="flex bg-gray-200 font-semibold justify-between items-center py-3 px-4 lg:px-6 text-gray-600 text-sm">
                    <span class="">@copy 2020 - {{date('Y')}}</span>
                    <span class="">code with in sidoarjo</span>
                </footer>
            </div>
        </div>
        @stack('modals')
        @stack('script')
    </body>
</html>
