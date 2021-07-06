<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title ?? "Iconnu" }} | {{ config('app.name') }}</title>
    <link rel="icon" href="{{ asset('favicon.jpeg') }}" type="image/jpeg" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @livewireStyles
    <script src="{{ asset('js/vendor/alpine.min.js') }}" defer></script>
    @yield('styles')
</head>

<body>
    <div class="container mx-auto">
        @yield('content')
    </div>
    @livewireScripts
    @livewire('livewire-ui-modal')
    @yield('scripts')
</body>

</html>
