<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <link rel="stylesheet" href="{{ url('css/main.css') }}">
        
    </head>
    <body class="antialiased">
        <div style="margin:5%;">

            @yield('content')

        </div>
        
    </body>
</html>
