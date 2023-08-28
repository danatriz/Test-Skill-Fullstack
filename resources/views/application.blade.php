<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- Favicon --}}
    <link rel="icon" href="{{ asset('favicon.png') }}" type="image/png" sizes="32x32">
    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- Title --}}
    <title>{{ config('app.name') }}</title>
    {{-- Vite --}}
    @vite([

    'resources/css/app.css',
    'resources/assets/css/icons.css',
    'resources/js/app.js',
    'resources/assets/libs/simplebar/simplebar.min.js',
    'resources/assets/libs/chart.js/chart.min.js',
    'resources/assets/libs/apexcharts/apexcharts.min.js',
    'resources/assets/libs/echarts/echarts.min.js',
    'resources/assets/js/main.js',
    ])
</head>

<body data-layout-mode="light" class="bg-gray-100 dark:bg-gray-900 bg-custom dark:bg-custom">
    <div id="app">
    </div>
</body>

</html>