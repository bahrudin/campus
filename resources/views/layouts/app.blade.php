<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Scripts Library Dependency-->
    @vite(['resources/sass/app.scss', 'resources/js/app.js','resources/js/datatables.net-bs5.js'])
    <!-- Styles Costume -->
    @stack('styles')
</head>
<body class="d-flex flex-column h-100">
<header>
    @include('layouts.partials.menu')
</header>
<main class="flex-shrink-0">
    <div class="container py-5">
        @yield('contents')
    </div>
</main>
<footer class="d-flex flex-wrap justify-content-between align-items-center py-3 bg-light fixed-bottom">
    @include('layouts.partials.footer')
</footer>
<!-- Scripts App-->
@stack('scripts')
</body>
</html>
