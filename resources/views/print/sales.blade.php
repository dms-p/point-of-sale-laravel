<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/app.css') }}">
    <!--font awesome-->
    <link rel="stylesheet" href="{{asset('vendor/fontawesome/css/fontawesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/fontawesome/css/light.min.css')}}">
    @livewireStyles
    <style>
        @media print{
            main{
                padding:0;
            }
            .no-print{
                display: none;
            }
            #receipt{
                width: initial;
                font-size: 8pt;
            }
            #a4{
                width: initial;
                font-size: 11pt;
            }
            #receipt table{
                font-size: 8pt!important;
            }
            #a4 table{
                font-size: 11pt!important;
            }
        }
    </style>
    <title>Print document sales</title>
</head>
<body>
    {{ $slot }}
</body>
@livewireScripts
<script src="{{asset('vendor/sweetalert/sweetalert2@10.js')}}"></script>
<script src="{{ mix('js/app.js') }}"></script>
<script src="{{asset('js/main.js')}}"></script>
</html>