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
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
        <style>
            .dashboard{
                content: url({{asset('images/dashboard.svg')}});
            }
        </style>
    </head>
    <body class="font-sans antialiased min-h-screen tracking-normal">
        <div class="w-full flex items-center justify-between">
            <div class="sm:w-2/5 p-8 w-full h-screen flex flex-col justify-between">
                <div>
                    <a href="#" class="bg-blue-200 mr-auto"><img src="{{asset('images/logo.png')}}" alt=""></a>
                </div>
                <div class="max-w-sm w-full mx-auto">
                    {{$slot}}
                </div>
                <div class="mx-auto">
                    <span class="text-gray-400 text-sm">Copyright © 2022 <a href="#" class="text-blue-500 font-semibold">Gentapos</a>.</span>
                </div>
            </div>
            <div class="sm:w-3/5 relative sm:block hidden bg-gradient-to-br from-indigo-400 to-blue-600 h-screen overflow-hidden">
                <!--div class="mt-32 ml-48 absolute w-2/3">
                    <h1 class="font-extrabold text-4xl text-white tracking-wide">Atur dan Kelola Kasir dengan Mudah & Cepat</h1>
                </div>
                <div class="dashboard max-w-2xl absolute mt-64 ml-48 shadow-md"></div-->
            </div>
        </div>
    </body>
</html>
