@extends('layouts.app', ['title' => 'Accueil'])
@section('styles')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endsection
@section('main')
<div class="flex flex-col justify-center items-center min-h-screen">
    <div class="text-white py-3 px-2 bg-gray-900 bg-opacity-25 rounded-md font-bold text-3xl mb-4"><span
            class="text-yellow-200">Deeds Register</span>, une application pour l'enregistrement des actes</div>
</div>
@endsection
@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function(){
            Livewire.emit("openModal", "auth.reset-password-form", @json(['token' => $token]))
        })
</script>
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
@endsection
