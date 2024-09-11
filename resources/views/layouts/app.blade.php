<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{$title ?? 'Socio Manage'}}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body hx-indicator="#progress-spinner">
<div id="progress-spinner" class="fixed inset-0 z-50 [.htmx-request&]:block hidden">
    <div class="w-full h-1 bg-gray-300">
        <div class="h-1 w-1/4 bg-gradient-to-r from-sky-200 to bg-sky-900 animate-loading"></div>
    </div>
    <div class="bg-black backdrop-blur-3xl opacity-50 w-screen h-screen"></div>
</div>
<div>
    {{ $slot }}
</div>
</body>
</html>
