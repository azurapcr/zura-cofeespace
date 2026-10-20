<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'Laravel') }}</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased bg-[#FDFDFC] text-[#1B1B18]">
        <div class="min-h-screen flex flex-col justify-center items-center">
            <h1 class="text-2xl font-bold">Selamat Datang di Coffee Space</h1>
        </div>
    </body>
</html>
