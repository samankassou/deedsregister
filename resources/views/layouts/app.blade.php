<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title ?? "Inconnu" }} | {{ config('app.name') }}</title>
    <link rel="icon" href="{{ asset('favicon.jpeg') }}" type="image/jpeg" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        /* Toggle A */
        input:checked ~ .dot {
        transform: translateX(100%);
        background-color: rgb(79, 70, 221);
        }
    </style>
    @livewireStyles
    <script src="{{ asset('js/vendor/alpine.min.js') }}" defer></script>
    @yield('styles')
</head>

<body>
    <div class="container mx-auto">
        @yield('main')
    </div>
    @livewireScripts
    @livewire('livewire-ui-modal')
    <script src="{{ asset('vendor/sweetalert/sweetalert2@11.js') }}"></script>
    <script src="{{ asset('js/alert.js') }}"></script>
    <script>
        document.addEventListener('alert-emit', event =>{
                Toast.fire({
                    icon: event.detail.alert,
                    title: event.detail.message
                })
            })
    </script>
    @if (session('alert'))
    <script>
        Toast.fire({
                    icon : "{{ session('alert') }}",
                    title: "{{ session('message') }}"
                })
    </script>
    @endif
    @if (session('unauthenticated'))
    <script>
        document.addEventListener('DOMContentLoaded', function(){
                    Livewire.emit('openModal', 'auth.login-form')
                })
    </script>
    @endif
    @yield('scripts')
</body>

</html>
