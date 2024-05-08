<!DOCTYPE html>
<html lang="sk">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'AnimeHaven') }}</title>

    {{-- Scripts --}}
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    {{-- Main Bar --}}
    @include('layouts.partials.main-bar')

    {{-- Navigation Bar --}}
    @include('layouts.partials.nav-bar')

    {{-- Floating Link for creating a new product --}}
    @include('layouts.partials.add-product')

    <!-- Page Content -->
    <main>
        {{ $slot }}
    </main>

    {{-- Footer --}}
    @include('layouts.partials.footer')

</body>

</html>
