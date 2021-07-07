@extends('layouts.app', ['title' => 'Accueil'])
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endsection
@section('main')
    <div class="flex flex-col justify-center items-center min-h-screen">
        <div class="text-white py-3 px-2 bg-gray-900 bg-opacity-25 rounded-md font-bold text-3xl mb-4"><span class="text-yellow-200">Deeds Register</span>, une application pour l'enregistrement des actes</div>
        @guest
            <button class="bg-yellow-800 hover:bg-yellow-500 text-white font-bold py-2 px-4 rounded"
                onclick="Livewire.emit('openModal', 'auth.login-form')">Se connecter</button>
        @endguest
        @auth
            <a href="{{ route('admin.dashboard') }}" class="bg-yellow-800 hover:bg-yellow-500 text-white font-bold py-2 px-4 rounded">Tableau de bord</a>
        @endauth
    </div>
@endsection
@section('scripts')
    @if (session('unauthenticated'))
        <script>
            document.addEventListener('DOMContentLoaded', function(){
                Livewire.emit('openModal', 'auth.login-form')
            })
        </script>
    @endif
@endsection
